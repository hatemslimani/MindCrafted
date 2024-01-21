<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class groupModel extends Model
{
    protected $table="groupe";
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];
}
