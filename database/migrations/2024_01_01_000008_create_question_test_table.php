<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTestTable extends Migration
{
    public function up()
    {
        Schema::create('question_test', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->foreignId('idTest')->constrained('test')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('question_test');
    }
} 