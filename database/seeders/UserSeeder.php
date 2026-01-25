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


// 13
        $warga = User::create([
            'email' => 'admin@holl.com',
            'password' =>  bcrypt('admin@holl.com'),

        ]);

        $warga->assignRole('admin');



        // 13
          // 13
        $user = User::create([
            'id' => 13,
            'email' => 'septer@gmail.com',
            'password' => bcrypt('septer@gmail.com'),
        ]);
        $user->assignRole('warga');

        // 14
        $user = User::create([
            'id' => 14,
            'email' => 'elia@gmail.com',
            'password' => bcrypt('elia@gmail.com'),
        ]);
        $user->assignRole('warga');

        // 15
        $user = User::create([
            'id' => 15,
            'email' => 'yosep@gmail.com',
            'password' => bcrypt('yosep@gmail.com'),
        ]);
        $user->assignRole('warga');

        // 16
        $user = User::create([
            'id' => 16,
            'email' => 'markus@gmail.com',
            'password' => bcrypt('markus@gmail.com'),
        ]);
        $user->assignRole('warga');

        // 17
        $user = User::create([
            'id' => 17,
            'email' => 'piska@gmail.com',
            'password' => bcrypt('piska@gmail.com'),
        ]);
        $user->assignRole('warga');




        // =========================
        // KEPALA KAMPUNG (ID 18)
        // =========================
        $user = User::create([
            'id' => 18,
            'email' => 'kepala@holtekamp.id',
            'password' => bcrypt('kepala@holtekamp.id'),
        ]);
        $user->assignRole('kepala');

        // =========================
        // RW (ID 19 - 21)
        // =========================

        $user = User::create([
            'id' => 19,
            'email' => 'rw01@holtekamp.id',
            'password' => bcrypt('rw01@holtekamp.id'),
        ]);
        $user->assignRole('rw');

        $user = User::create([
            'id' => 20,
            'email' => 'rw02@holtekamp.id',
            'password' => bcrypt('rw02@holtekamp.id'),
        ]);
        $user->assignRole('rw');

        $user = User::create([
            'id' => 21,
            'email' => 'rw03@holtekamp.id',
            'password' => bcrypt('rw03@holtekamp.id'),
        ]);
        $user->assignRole('rw');

        // =========================
        // RT RW 01 (ID 22 - 25)
        // =========================

        $user = User::create([
            'id' => 22,
            'email' => 'rt01_rw01@holtekamp.id',
            'password' => bcrypt('rt01_rw01@holtekamp.id'),
        ]);
        $user->assignRole('rt');

        $user = User::create([
            'id' => 23,
            'email' => 'rt02_rw01@holtekamp.id',
            'password' => bcrypt('rt02_rw01@holtekamp.id'),
        ]);
        $user->assignRole('rt');

        $user = User::create([
            'id' => 24,
            'email' => 'rt03_rw01@holtekamp.id',
            'password' => bcrypt('rt03_rw01@holtekamp.id'),
        ]);
        $user->assignRole('rt');

        $user = User::create([
            'id' => 25,
            'email' => 'rt04_rw01@holtekamp.id',
            'password' => bcrypt('rt04_rw01@holtekamp.id'),
        ]);
        $user->assignRole('rt');

        // =========================
        // RT RW 02 (ID 26 - 27)
        // =========================

        $user = User::create([
            'id' => 26,
            'email' => 'rt01_rw02@holtekamp.id',
            'password' => bcrypt('rt01_rw02@holtekamp.id'),
        ]);
        $user->assignRole('rt');

        $user = User::create([
            'id' => 27,
            'email' => 'rt02_rw02@holtekamp.id',
            'password' => bcrypt('rt02_rw02@holtekamp.id'),
        ]);
        $user->assignRole('rt');

        // =========================
        // RT RW 03 (ID 28 - 30)
        // =========================

        $user = User::create([
            'id' => 28,
            'email' => 'rt01_rw03@holtekamp.id',
            'password' => bcrypt('rt01_rw03@holtekamp.id'),
        ]);
        $user->assignRole('rt');

        $user = User::create([
            'id' => 29,
            'email' => 'rt02_rw03@holtekamp.id',
            'password' => bcrypt('rt02_rw03@holtekamp.id'),
        ]);
        $user->assignRole('rt');

        $user = User::create([
            'id' => 30,
            'email' => 'rt03_rw03@holtekamp.id',
            'password' => bcrypt('rt03_rw03@holtekamp.id'),
        ]);
        $user->assignRole('rt');
    }
}
