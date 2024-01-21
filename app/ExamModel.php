<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamModel extends Model
{
    protected $table="exam";
    protected $fillable = [
        'id',
        'name',
        'description',
        'duree',
        'catg',
        'content',
        'created_at',
        'updated_at',
        'idSection',
    ];
}
