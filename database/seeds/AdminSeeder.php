<?php 

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder {

    public function run() {

        DB::table('permissions')->insert([
            'slug' => 'beastmaster',
            'name' => 'Ver Dashboard',
        ], [
            'slug' => 'view-users',
            'name' => 'Ver usuarios',
        ], [
            'slug' => 'edit-users',
            'name' => 'Editar usuarios'
        ], [
            'slug' => 'view-roles',
            'name' => 'Ver roles'
        ], [
            'slug' => 'create-roles',
            'name' => 'Crear rol'
        ], [
            'slug' => 'edit-roles',
            'name' => 'Editar roles'
        ], [
            'slug' => 'view-permission',
            'name' => 'Ver permissos'
        ], [
            'slug' => 'create-permission',
            'name' => 'Crear permiso'
        ], [
            'slug' => 'edit-permission',
            'name' => 'Editar permisos'
        ]);

        DB::table('roles')->insert([
            'slug' => 'admin',
            'name' => 'Administrador'
        ]);

        DB::table('users')->insert([
            'name' => 'Dani Molina',
            'email' => 'rastler89@gmail.com',
            'password' => Hash::make('544728')
        ]);

        DB::table('roles_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 1
        ], [
            'role_id' => 1,
            'permission_id' => 2
        ], [
            'role_id' => 1,
            'permission_id' => 3
        ], [
            'role_id' => 1,
            'permission_id' => 4
        ], [
            'role_id' => 1,
            'permission_id' => 5
        ], [
            'role_id' => 1,
            'permission_id' => 6
        ], [
            'role_id' => 1,
            'permission_id' => 7
        ], [
            'role_id' => 1,
            'permission_id' => 8
        ], [
            'role_id' => 1,
            'permission_id' => 9
        ]);

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1
        ]);
    }
}