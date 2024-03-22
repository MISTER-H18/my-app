<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class finanzaController extends Controller
{
    public function pdf()
    {
        $transaccionTotal = DB::select("SELECT
        SUM(CASE tipo
          WHEN 1 THEN monto
          ELSE -monto
        END) AS total_monto
      FROM transaction
      WHERE MONTH(fecha) = MONTH(CURDATE());");
        $totalEgresoMes = DB::select("SELECT SUM(monto) AS total_monto
        FROM transaction
        WHERE tipo = 0;");
        $totalIngresoMes = DB::select("SELECT SUM(monto) AS total_monto
        FROM transaction
        WHERE tipo = 1;");
        $transactionMes = DB::select("SELECT
        transaction.id,
        date(transaction.fecha) AS fecha,
        transaction.descripcion,
        transaction.monto,
        transaction.tipo,
        transaction.user_id,
        users.name,
        users.last_name
        FROM transaction  
        INNER JOIN users ON transaction.user_id = users.id
        WHERE MONTH(fecha) = MONTH(CURDATE());");
        $pdf = Pdf::loadView('finanzas.pdf', compact('transactionMes'), compact('transaccionTotal'));
        return $pdf->stream();
    }
    public function update(Request $request)
    {
        try {
            $sql = DB::update("UPDATE transaction SET fecha=?, descripcion=?, monto=?, tipo=?, user_id=? WHERE id=? ", [
                $request->fecha,
                $request->description,
                $request->monto,
                $request->tipo,
                $request->user_id,
                $request->id,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            $sql = 0;
        }
        if ($sql == true) {
            return redirect()->route('finanzas.index')->with('success', '¡Transacción modificada exitosamente!');;
        } else {
            return back()->with('error', 'Falló de la transacción. Intenta nuevamente.');
        }
    }
    public function index()
    {
        $transaccionTotal = DB::select("SELECT SUM(CASE tipo
        WHEN 1 THEN monto
        ELSE 0
    END) AS total_monto
    FROM transaction;");
        $graficaIngreso = DB::select("SELECT MONTH(fecha) AS mes, SUM(monto) AS total_monto
        FROM transaction
        WHERE tipo = 0
        GROUP BY MONTH(fecha);");
        $dataP = [];
        foreach ($graficaIngreso as $comparacion) {
            $dataP['mes'][] = $comparacion->mes;
            $dataP['comparacion'][] = $comparacion->total_monto;
        }
        $dataP['dataP'] = json_encode($dataP);

        $graficaEgres = DB::select("SELECT MONTH(fecha) AS mes, SUM(monto) AS total_monto
        FROM transaction
        WHERE tipo = 1
        GROUP BY MONTH(fecha);");
        $data = [];
        foreach ($graficaEgres as $comparacion) {
            $data['mes'][] = $comparacion->mes;
            $data['comparacion'][] = $comparacion->total_monto;
        }
        $data['data'] = json_encode($data);
        $totalEgresoMes = DB::select("SELECT SUM(COALESCE(monto, 0)) AS total_monto
        FROM transaction
        WHERE tipo = 0 and
 MONTH(fecha) = MONTH(CURDATE());");
        $totalIngresoMes = DB::select("SELECT SUM(COALESCE(monto, 0)) AS total_monto FROM transaction WHERE tipo = 1 AND MONTH(fecha) = MONTH(CURDATE());");
        $transactionMes = DB::select("SELECT COUNT(*) AS total_registros
        FROM transaction
        WHERE MONTH(fecha) = MONTH(CURDATE());");
        $transaction = DB::select("SELECT
        transaction.id,
        date(transaction.fecha) AS fecha,
        transaction.descripcion,
        transaction.monto,
        transaction.tipo,
        transaction.user_id,
        users.name,
        users.last_name
        FROM transaction
        INNER JOIN users ON transaction.user_id = users.id;");
        return view('finanzas\crud', $dataP, $data)->with('transaction', $transaction)->with('totalIngresoMes', $totalIngresoMes)->with('totalEgresoMes', $totalEgresoMes)->with('transactionMes', $transactionMes)->with('transaccionTotal', $transaccionTotal);
    }
    public function create()
    {
        $users = DB::select('select id, name, last_name  from users');
        return view('finanzas\create')->with('users', $users);
    }
    public function destroy($id)
    {
        $sqls = DB::delete("DELETE FROM transaction WHERE id = $id");
        if ($sqls == true) {
            return redirect()->route('finanzas.index')->with('success', '¡Transacción eliminada exitosamente!');
        } else {
            return back()->with('error', 'Falló de la transacción. Intenta nuevamente.');
        }
    }
    public function show($id)
    {
        $users = DB::select('select id, name, last_name  from users');
        $transaction = DB::select("SELECT
        transaction.id,
        date(transaction.fecha) AS fecha,
        transaction.descripcion,
        transaction.monto,
        transaction.tipo,
        transaction.user_id,
        users.name,
        users.last_name
    FROM transaction
    INNER JOIN users ON transaction.user_id = users.id
    WHERE transaction.id = $id");
        return view('finanzas\show')->with('transaction', $transaction)->with('users', $users);
    }
    //Metodo para guardar los cursos en la base de datos
    public function store(Request $request)
    {
        $sql = DB::insert('INSERT INTO transaction (fecha, descripcion, monto, tipo, user_id ) VALUES(?,?,?,?,?)', [
            $request->fecha,
            $request->description,
            $request->monto,
            $request->tipo,
            $request->user_id,
        ]);

        if ($sql) {  // Comprueba si la inserción fue exitosa
            return redirect()->route('finanzas.index')->with('success', '¡Transacción creada exitosamente!');
        } else {
            return back()->with('error', 'Falló la creación de la transacción. Intenta nuevamente.');
        }
    }
}
