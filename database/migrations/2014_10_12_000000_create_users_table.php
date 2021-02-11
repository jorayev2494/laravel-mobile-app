<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            
            $table->string('phone', 255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('email_confirmed')->nullable();
            $table->string('password');
            
            $table->boolean('is_blocked')->default(false);
            $table->timestamp('last_login')->nullable();
            $table->timestamp('last_activity')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
