<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('catg');
            $table->text('content');
            $table->foreignId('section_id')->constrained('section')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('course');
    }
} 