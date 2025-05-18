<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('profile_pic')->nullable();
            $table->string('email')->unique();
            $table->date('birthday')->nullable();
            $table->text('bio')->nullable();
            $table->string('username');
            $table->string('password');
            $table->enum('role', ['admin', 'student', 'public'])->default('public');
            $table->integer('nis')->nullable();
            $table->integer('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
