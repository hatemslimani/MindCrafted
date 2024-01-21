<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionExamenTable extends Migration
{
    public function up()
    {
        Schema::create('question_examen', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->string('option_correct');
            $table->string('option1');
            $table->string('option2');
            $table->string('option3');
            $table->foreignId('idExamen')->constrained('exam')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('question_examen');
    }
} 