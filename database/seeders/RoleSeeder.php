<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // php artisan db:seed --class=RoleSeeder



        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        Permission::create([
            'name' => 'admin.home',
            'description' => ' ver el dashborad'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name' => 'admin.users.index',
            'description' => 'ver listado usuarios'
        ])->syncRoles([$role1]);

        Permission::create([
            'name' => 'admin.users.edit',
            'description' => 'asignar rol a usuario'
        ])->syncRoles([$role1]);


        Permission::create([
            'name' => 'admin.categories.index',
            'description' => 'ver listado de categorias'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.categories.create',
            'description' => 'crear categorias'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.categories.edit',
            'description' => 'modificar categoria'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.categories.destroy',
            'description' => 'Eliminar categoria'
        ])->syncRoles([$role1]);

        Permission::create([
            'name' => 'admin.tags.index',
            'description' => 'ver litado de tags'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.tags.create',
            'description' => 'crear tags'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.tags.edit',
            'description' => 'modificar tags'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.tags.destroy',
            'description' => 'Eliminar tags'
        ])->syncRoles([$role1]);

        Permission::create([
            'name' => 'admin.posts.index',
            'description' => 'ver listado de posts'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.posts.create',
            'description' => 'crear posts'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.posts.edit',
            'description' => 'modificar posts'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.posts.destroy',
            'description' => 'Eliminar post'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name' => 'admin.roles.index',
            'description' => 'ver listado de roles'
        ])->syncRoles([$role1,]);
        Permission::create([
            'name' => 'admin.roles.create',
            'description' => 'crear roles'
        ])->syncRoles([$role1,]);
        Permission::create([
            'name' => 'admin.roles.edit',
            'description' => 'modificar roles'
        ])->syncRoles([$role1,]);
        Permission::create([
            'name' => 'admin.roles.destroy',
            'description' => 'Eliminar roles'
        ])->syncRoles([$role1,]);
    }
}
