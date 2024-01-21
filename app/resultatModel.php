<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class resultatModel extends Model
{
    protected $table="resultat";
    protected $fillable = [
        'id',
        'name',
        'categorie',
        'moyen',
        'updated_at',
        'idUser',
        'idSection',
        'created_at',
    ];
}