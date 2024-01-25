<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        DB::table('users')->insert([
            'name' => 'hatem slimani',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'category' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Enseignant 1
        DB::table('users')->insert([
            'name' => 'Mounir',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('password'),
            'category' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Enseignant 2
        DB::table('users')->insert([
            'name' => 'Malek',
            'email' => 'hatemslimani2021@gmail.com',
            'password' => Hash::make('password'),
            'category' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Étudiant
        DB::table('users')->insert([
            'name' => 'Mohamed',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'category' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
} 