<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamSeeder extends Seeder
{
    public function run()
    {
        // Créer l'examen
        $exam = DB::table('exam')->insertGetId([
            'name' => 'Examen n1',
            'description' => 'examen de compréhension',
            'duree' => 30,
            'catg' => 'exam',
            'idSection' => 1,
            'content' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Créer les questions
        $question1 = DB::table('question_examen')->insertGetId([
            'question' => 'Choose the correct HTML element for the largest heading:',
            'idExamen' => $exam,
            'option_correct' => '<h1>',
            'option1' => '<h6></h6>',
            'option2' => '<head></head>',
            'option3' => '<heading>',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Options pour question 1
        DB::table('option_question_examen')->insert([
            [
                'options' => '<h6></h6>',
                'is_correct' => 0,
                'idQuestion' => $question1,
                'idExam' => $exam,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'options' => '<head></head>',
                'is_correct' => 0,
                'idQuestion' => $question1,
                'idExam' => $exam,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'options' => '<heading>',
                'is_correct' => 0,
                'idQuestion' => $question1,
                'idExam' => $exam,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'options' => '<h1>',
                'is_correct' => 1,
                'idQuestion' => $question1,
                'idExam' => $exam,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
} 