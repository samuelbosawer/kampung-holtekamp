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


        // 1

        $admin = User::create([
            'email' => 'admin@holl.com',
            'password' =>  bcrypt('admin@holl.com'),

        ]);

        $admin->assignRole('admin');

        // 2
        $rt = User::create([
            'email' => 'kepala@holl.com',
            'password' =>  bcrypt('kepala@holl.com'),

        ]);

        $rt->assignRole('kepala');


        // 3
        $rw = User::create([
            'email' => 'rw001@holl.com',
            'password' =>  bcrypt('rw001@holl.com'),

        ]);

        $rw->assignRole('rw');



        // 4
        $rw = User::create([
            'email' => 'rw002@holl.com',
            'password' =>  bcrypt('rw002@holl.com'),

        ]);

        $rw->assignRole('rw');

        // 5
        $rw = User::create([
            'email' => 'rw003@holl.com',
            'password' =>  bcrypt('rw003@holl.com'),

        ]);

        $rw->assignRole('rw');






        // 6
        $rt = User::create([
            'email' => 'rt001@holl.com',
            'password' =>  bcrypt('rt001@holl.com'),

        ]);

        $rt->assignRole('rt');


        // 7
        $rt = User::create([
            'email' => 'rt002@holl.com',
            'password' =>  bcrypt('rt002@holl.com'),

        ]);

        $rt->assignRole('rt');

        // 8
        $rt = User::create([
            'email' => 'rt003@holl.com',
            'password' =>  bcrypt('rt003@holl.com'),

        ]);

        $rt->assignRole('rt');

        // 9
        $rt = User::create([
            'email' => 'rt004@holl.com',
            'password' =>  bcrypt('rt004@holl.com'),

        ]);
        $rt->assignRole('rt');


        // 10
        $rt = User::create([
            'email' => 'rt005@holl.com',
            'password' =>  bcrypt('rt005@holl.com'),

        ]);

        $rt->assignRole('rt');

        // 11
        $rt = User::create([
            'email' => 'rt006@holl.com',
            'password' =>  bcrypt('rt006@holl.com'),

        ]);

        $rt->assignRole('rt');

        // 12
        $rt = User::create([
            'email' => 'rt007@holl.com',
            'password' =>  bcrypt('rt007@holl.com'),

        ]);

        $rt->assignRole('rt');




        // 13
        $warga = User::create([
            'email' => 'septer@gmail.com',
            'password' =>  bcrypt('septer@gmail.com'),

        ]);

        $warga->assignRole('warga');

          // 14
        $warga = User::create([
            'email' => 'elia@gmail.com',
            'password' =>  bcrypt('elia@gmail.com'),

        ]);

        $warga->assignRole('warga');


         // 15
        $warga = User::create([
            'email' => 'yosep@gmail.com',
            'password' =>  bcrypt('yosep@gmail.com'),

        ]);

        $warga->assignRole('warga');

        
         // 16
        $warga = User::create([
            'email' => 'markus@gmail.com',
            'password' =>  bcrypt('markus@gmail.com'),

        ]);

        $warga->assignRole('warga');


        // 16
        $warga = User::create([
            'email' => 'piska@gmail.com',
            'password' =>  bcrypt('piska@gmail.com'),

        ]);

        $warga->assignRole('warga');
    }
}
