<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    protected $table="test";
    protected $fillable = [
        'id',
        'name',
        'description',
        'catg',
        'duree',
        'idSection',
        'created_at',
        'updated_at',
    ];
}
