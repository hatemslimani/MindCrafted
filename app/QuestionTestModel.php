<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionTestModel extends Model
{
    protected $table="question_test";
    protected $fillable = [
        'id',
        'question',
        'idTest',
        'created_at',
        'updated_at',
    ];
}
