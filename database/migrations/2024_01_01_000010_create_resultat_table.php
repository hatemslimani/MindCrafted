<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultatTable extends Migration
{
    public function up()
    {
        Schema::create('resultat', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('categorie');
            $table->float('moyen');
            $table->foreignId('idUser')->constrained('users')->onDelete('cascade');
            $table->foreignId('idSection')->constrained('section')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resultat');
    }
} 