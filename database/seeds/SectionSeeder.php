<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    public function run()
    {
        DB::table('section')->insert([
            [
                'namesection' => 'Html',
                'description' => 'Le HTML n\'est en aucun cas un langage de programmation : son but est de décrire et structurer des informations',
                'group_id' => 1,
                'teacher_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'namesection' => 'css',
                'description' => 'permet de décrire la présentation des documents HTML et XML.',
                'group_id' => 1,
                'teacher_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
} 