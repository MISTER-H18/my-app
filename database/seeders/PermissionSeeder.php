<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use Carbon\Carbon;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view-dashboard', //#1
            
            'view-census', //#2
            'update-census',
            'store-census',
            'delete-from-census',

            'view-finances', //#6
            'update-finances',
            'store-finances',
            'delete-from-finances',

            'view-events', //#10
            'update-events',
            'store-events',
            'delete-from-events',

            'view-courses', //#14
            'update-courses',
            'store-courses',
            'delete-from-courses',

            'backup-database',//#18
            'rename-system',
            'update-systems-logo',//#20
        ];

        foreach ($permissions as $new_permission){

            $permission = new Permission;

            $permission->title = $new_permission;

            $permission->created_at = Carbon::now();
            $permission->updated_at = Carbon::now();
        
            $permission->save();
        }
    }
}
