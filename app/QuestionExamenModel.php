<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionExamenModel extends Model
{
    protected $table="question_examen";
    protected $fillable = [
        'id',
        'question',
        'option_correct',
        'option1',
        'option2',
        'option3',
        'idExamen',
        'created_at',
        'updated_at',
    ];
}
