<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roleAdmin = Role::firstOrCreate(['name' => 'Admin']);
        $roleDosen = Role::firstOrCreate(['name' => 'Dosen']);
        $roleMahasiswa = Role::firstOrCreate(['name' => 'Mahasiswa']);

        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            ['name' => 'Admin Sistem', 'password' => bcrypt('password')]
        );
        $admin->assignRole($roleAdmin);

        $dosen = User::firstOrCreate(
            ['email' => 'dosen@gmail.com'],
            ['name' => 'Bapak Dosen', 'password' => bcrypt('password')]
        );
        $dosen->assignRole($roleDosen);

        $mhs = User::firstOrCreate(
            ['email' => 'mhs@gmail.com'],
            ['name' => 'Mahasiswa SKS', 'password' => bcrypt('password')]
        );
        $mhs->assignRole($roleMahasiswa);
    }
}