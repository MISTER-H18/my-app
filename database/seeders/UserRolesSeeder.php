<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\UserRoles;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['Administrador', 'Administra y gestiona todos los aspectos del sistema.'],
            ['Miembro', 'Usuario básico del sitema con privilegios limitados.'],
            ['Lider de Grupo', 'Lidera un grupo especifico de la iglesia.'],
            ['Docente', 'Gestiona todos los cursos disponibles de la iglesia.'],
        ];

        foreach ($roles as $new_rol){

            $rol = new UserRoles;

            $rol->rol_name = $new_rol[0];
            $rol->description = $new_rol[1];

            $rol->created_at = Carbon::now();
            $rol->updated_at = Carbon::now();
        
            $rol->save();
        }

    }
}
