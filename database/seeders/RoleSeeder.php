<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $role = Role::create([
        "name" => "admindinas",
        'guard_name' => 'web',
       ]);

       $role = Role::create([
        "name" => "petugas",
        'guard_name' => 'web',
       ]);

       $role = Role::create([
        "name" => "kepaladinas",
        'guard_name' => 'web',
       ]);

        $role = Role::create([
        "name" => "masyarakat",
        'guard_name' => 'web',
       ]);

    }
}
