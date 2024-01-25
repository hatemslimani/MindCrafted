<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    public function run()
    {
        // Créer le test
        $test = DB::table('test')->insertGetId([
            'name' => 'Test N1',
            'description' => 'tests de connaissances en HTML',
            'duree' => 30,
            'catg' => 'test',
            'idSection' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Créer les questions
        $question1 = DB::table('question_test')->insertGetId([
            'question' => 'Quel caractère est utilisé pour indiquer une balise de fin?',
            'idTest' => $test,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Options pour question 1
        DB::table('option_question_test')->insert([
            [
                'options' => '<',
                'is_correct' => 0,
                'idQuestion' => $question1,
                'idTest' => $test,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'options' => '$',
                'is_correct' => 0,
                'idQuestion' => $question1,
                'idTest' => $test,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'options' => '/',
                'is_correct' => 1,
                'idQuestion' => $question1,
                'idTest' => $test,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'options' => '*',
                'is_correct' => 0,
                'idQuestion' => $question1,
                'idTest' => $test,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
} 