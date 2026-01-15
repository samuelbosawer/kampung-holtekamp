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
   

        $user = User::create([
            'email' => 'admindinas@master.com',
            'password' =>  bcrypt('admindinas@master.com'),

        ]);

               $user->assignRole('admindinas');

         $user = User::create([
            'email' => 'petugas@master.com',
            'password' =>  bcrypt('petugas@master.com'),

        ]);
        $user->assignRole('petugas');


       

        
         $user = User::create([
            'email' => 'kepaladinas@master.com',
            'password' =>  bcrypt('kepaladinas@master.com'),

        ]);

        $user->assignRole('kepaladinas');

          $user = User::create([
            'email' => 'mira@gmail.com',
            'password' =>  bcrypt('mira@gmail.com'),

        ]);
        $user->assignRole('masyarakat');


         $user = User::create([
            'email' => 'angel@gmail.com',
            'password' =>  bcrypt('angel@gmail.com'),

        ]);
        $user->assignRole('masyarakat');


           $user = User::create([
            'email' => 'julia@gmail.com',
            'password' =>  bcrypt('julia@gmail.com'),

        ]);
        $user->assignRole('masyarakat');


        
           $user = User::create([
            'email' => 'maria@gmail.com',
            'password' =>  bcrypt('maria@gmail.com'),

        ]);
        $user->assignRole('masyarakat');


        $user = User::create([
            'email' => 'melan@gmail.com',
            'password' =>  bcrypt('melan@gmail.com'),

        ]);
        $user->assignRole('masyarakat');


          $user = User::create([
            'email' => 'petugas2@master.com',
            'password' =>  bcrypt('petugas2@master.com'),

        ]);
        $user->assignRole('petugas');


        



       
        
    }
}
