<?php

namespace Database\Seeders;

use App\Models\Privileges;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivilegesSeeder extends Seeder
{

    public array $roles_has_permissions = [];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = DB::table('permissions')->count();

        if ($count > 0) {

            $lider_privileges = [1, 2, 3, 4, 6, 10, 11, 12, 14, 15];
            $miembro_privileges = [1, 2, 6, 10, 14];
            $docente_privileges = [1, 2, 6, 10, 14, 15, 16, 17];

            //Privileges for Admin
            for ($i = 1; $i <= $count; $i++) {
                $this->roles_has_permissions[$i] = [1, $i];
            }

            //Privileges for lider de grupo
            foreach ($lider_privileges as $lider_privilege) {
                array_push($this->roles_has_permissions, [2, $lider_privilege]);
            }

            //Privileges for Miembro
            foreach ($miembro_privileges as $miembro_privilege) {
                array_push($this->roles_has_permissions, [3, $miembro_privilege]);
            }

            foreach ($docente_privileges as $docente_privilege) {
                array_push($this->roles_has_permissions, [4, $docente_privilege]);
            }

            foreach ($this->roles_has_permissions as $new_rol_privilege) {

                $privilege = new Privileges;

                $privilege->user_rol_id = $new_rol_privilege[0];
                $privilege->permission_id = $new_rol_privilege[1];

                $privilege->created_at = Carbon::now();
                $privilege->updated_at = Carbon::now();

                $privilege->save();
            }
        }
    }
}
