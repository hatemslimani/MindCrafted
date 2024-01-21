<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionTables extends Migration
{
    public function up()
    {
        Schema::create('option_question_test', function (Blueprint $table) {
            $table->id();
            $table->string('options');
            $table->boolean('is_correct');
            $table->foreignId('idQuestion')->constrained('question_test')->onDelete('cascade');
            $table->foreignId('idTest')->constrained('test')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('option_question_examen', function (Blueprint $table) {
            $table->id();
            $table->string('options');
            $table->boolean('is_correct');
            $table->foreignId('idQuestion')->constrained('question_examen')->onDelete('cascade');
            $table->foreignId('idExam')->constrained('exam')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('option_question_test');
        Schema::dropIfExists('option_question_examen');
    }
} 