<?php

use App\groupModel;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run()
    {
        groupModel::create([
            'name' => 'Groupe 1',
        ]);

        groupModel::create([
            'name' => 'Groupe 2',
        ]);
    }
} 