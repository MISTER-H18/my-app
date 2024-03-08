<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_roles')->insertOrIgnore(['rol_name' => 'Admin', 'description' => 'Administra y gestiona todos los aspectos del sistema', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('user_roles')->insertOrIgnore(['rol_name' => 'Lider de Grupo', 'description' => 'Lidera un grupo especifico de la iglesia', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('user_roles')->insertOrIgnore(['rol_name' => 'Miembro de la Congregacion', 'description' => 'Usuario básico del sitema con privilegios limitados', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
    }
}
