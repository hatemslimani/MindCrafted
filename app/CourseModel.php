<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    protected $table="course";
    protected $fillable = [
        'id',
        'name',
        'description',
        'catg',
        'content',
        'created_at',
        'updated_at',
        'section_id',
    ];
}
