<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionTable extends Migration
{
    public function up()
    {
        Schema::create('section', function (Blueprint $table) {
            $table->id();
            $table->string('namesection');
            $table->text('description');
            $table->unsignedInteger('group_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->timestamps();
            
            $table->foreign('group_id')->references('id')->on('groupe')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('section');
    }
} 