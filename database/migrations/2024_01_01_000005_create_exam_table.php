<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamTable extends Migration
{
    public function up()
    {
        Schema::create('exam', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->text('description');
            $table->integer('duree');
            $table->string('catg', 20);
            $table->text('content')->nullable();
            $table->unsignedBigInteger('idSection');
            $table->timestamps();
            
            $table->foreign('idSection')->references('id')->on('section')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('exam');
    }
} 