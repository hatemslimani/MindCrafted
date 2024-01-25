<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            GroupSeeder::class,
            SectionSeeder::class,
            CourseSeeder::class,
            ExamSeeder::class,
            TestSeeder::class,
            ResultatSeeder::class
        ]);
    }
}
