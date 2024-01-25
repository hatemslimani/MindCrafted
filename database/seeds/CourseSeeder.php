<?php

use App\CourseModel;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        CourseModel::create([
            'name' => 'html',
            'description' => 'Ce chapitre présente les notions de base du langage HTML',
            'catg' => 'course',
            'content' => 'Contenu du cours HTML...',
            'section_id' => 1
        ]);

        CourseModel::create([
            'name' => 'Objectif de HTML',
            'description' => 'Ce chapitre présente les objectf du langage HTML',
            'catg' => 'course',
            'content' => 'Contenu des objectifs...',
            'section_id' => 1
        ]);
    }
} 