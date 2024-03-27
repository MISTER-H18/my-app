<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Privileges;
use App\Models\UserRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = $request->get('perPage');

        if (empty($perPage)) {
            $perPage = 5;
        }

        if (!empty($keyword)) {
            $roles = UserRoles::where('rol_name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()
                ->paginate($perPage);
        } else {
            $roles = UserRoles::paginate($perPage);
        }
        return view('roles.index', ['roles' => $roles, 'perPage' => $perPage])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::select('id', 'title')->orderBy('id', 'ASC')->get();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rol_name' => 'required|string|alpha|max:40|min:3|unique:user_roles,rol_name',
            'description' => 'required|string|max:120|min:10',
        ]);

        $user_rol = UserRoles::create([
            'rol_name' => Str::ucfirst(Str::lower($request->rol_name)),
            'description' => Str::ucfirst(Str::lower($request->description)),
        ]);

        $privileges_allowed = $request->privileges;

        $user_rol->permissions()->attach($privileges_allowed, [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return to_route('roles.index');
        // ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user_rol = UserRoles::findOrFail($id);
        return view('roles.show', compact('user_rol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user_rol = UserRoles::findOrFail($id);
        return view('roles.edit', ['user_rol' => $user_rol]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rol_name' => 'required|string|alpha|max:40|min:3',
            'description' => 'required|string|max:120|min:10',
        ]);

        $user_rol = UserRoles::findOrFail($id);

        $user_rol->rol_name = Str::ucfirst(Str::lower($request->rol_name));
        $user_rol->description = Str::ucfirst(Str::lower($request->description));

        $user_rol->save();

        return to_route('roles.show', $user_rol->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if ($id > 2) {

            $user_rol = UserRoles::find($id);
            DB::table('users')
                ->where('user_rol_id', $id)
                ->update(['user_rol_id' => 2]);

            $user_rol->delete();
            $user_rol->permissions()->delete();

            return to_route('roles.index')->with('exito', 'Rol Eliminado!');
        }
        return to_route('roles.index')->with('error', 'No se logró eliminar el Rol!');
    }
}
