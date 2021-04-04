<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\DB;



class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'create requisitions']);
        Permission::create(['name' => 'delete requisitions']);
        Permission::create(['name' => 'edit requisitions']);
        Permission::create(['name' => 'approve requisitions']);
        Permission::create(['name' => 'reject requisitions']);
        Permission::create(['name' => 'dispatch requisitions']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        
        
        $role = Role::create(['name' => 'officer'])->givePermissionTo(['create requisitions', 'delete requisitions', 'edit requisitions']);
        $role = Role::create(['name' => 'c_level'])->givePermissionTo(['create requisitions', 'delete requisitions', 'edit requisitions', 'approve requisitions', 'reject requisitions']);
        $role = Role::create(['name' => 'finance'])->givePermissionTo(['create requisitions', 'delete requisitions', 'edit requisitions', 'approve requisitions', 'reject requisitions']);
        $role = Role::create(['name' => 'manager'])->givePermissionTo(['create requisitions', 'delete requisitions', 'edit requisitions', 'approve requisitions', 'reject requisitions']);
        $role = Role::create(['name' => 'procurement'])->givePermissionTo(['create requisitions', 'delete requisitions', 'edit requisitions', 'approve requisitions', 'reject requisitions']);
        $role = Role::create(['name' => 'internal_control'])->givePermissionTo(['create requisitions', 'delete requisitions', 'edit requisitions', 'approve requisitions', 'reject requisitions']);
        $role = Role::create(['name' => 'sh_tl'])->givePermissionTo(['create requisitions', 'delete requisitions', 'edit requisitions', 'approve requisitions', 'reject requisitions']);
        $role = Role::create(['name' => 'store'])->givePermissionTo(['dispatch requisitions']);
        
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
    

