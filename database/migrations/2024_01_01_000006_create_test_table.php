<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestTable extends Migration
{
    public function up()
    {
        Schema::create('test', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('catg');
            $table->integer('duree');
            $table->foreignId('idSection')->constrained('section')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('test');
    }
} 