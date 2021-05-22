<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('author_id')->unsigned();            
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('code', 255);
            $table->date('expires_end')->nullable();            
            $table->integer('security_code')->unsigned();            
            $table->string('type_card', 50)->default('visa');            
            

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
        Schema::dropIfExists('cards');
    }
}
