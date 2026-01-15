<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   

        $admin = User::create([
            'email' => 'admin@holl.com',
            'password' =>  bcrypt('admin@holl.com'),

        ]);

        $admin->assignRole('admin');


        $rt = User::create([
            'email' => 'kepala@holl.com',
            'password' =>  bcrypt('kepala@holl.com'),

        ]);

       $rt->assignRole('kepala');

         $rw = User::create([
            'email' => 'rw001@holl.com',
            'password' =>  bcrypt('rw001@holl.com'),

        ]);

        $rw->assignRole('rw');


        $rt = User::create([
            'email' => 'rt001@holl.com',
            'password' =>  bcrypt('rt001@holl.com'),

        ]);

       $rt->assignRole('rt');


       $warga = User::create([
            'email' => 'septer@gmail.com',
            'password' =>  bcrypt('septer@gmail.com'),

        ]);

       $warga->assignRole('warga');

        
        



       
        
    }
}
