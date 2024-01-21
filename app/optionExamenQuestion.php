<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class optionExamenQuestion extends Model
{
    protected $table="option_question_examen";
    protected $fillable = [
        'id',
        'options',
        'is_correct',
        'idQuestion',
        'idExam',
        'created_at',
        'updated_at',
    ];
}
