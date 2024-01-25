<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultatSeeder extends Seeder
{
    public function run()
    {
        DB::table('resultat')->insert([
            [
                'name' => 'Test N1',
                'categorie' => 'test',
                'moyen' => 3,
                'idUser' => 2,
                'idSection' => 1,
                'created_at' => '2020-05-11 08:58:26',
                'updated_at' => '2020-05-13 08:58:26'
            ],
            [
                'name' => 'Examen n1',
                'categorie' => 'exam',
                'moyen' => 6,
                'idUser' => 2,
                'idSection' => 1,
                'created_at' => '2020-05-18 09:13:59',
                'updated_at' => '2020-05-12 09:13:59'
            ]
        ]);
    }
} 