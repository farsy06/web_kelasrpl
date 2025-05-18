<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('karya', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('title');
            $table->text('desc');
            $table->string('link')->nullable();
            $table->text('karya');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('karya');
    }
};
