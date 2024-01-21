<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionTestQuestion extends Model
{
    protected $table="option_question_test";
    protected $fillable = [
        'id',
        'options',
        'is_correct',
        'idQuestion',
        'idTest',
        'created_at',
        'updated_at',
    ];
}
