<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table): void {
            $table->id();
            
            $table->string("name", 255);
            $table->string("city", 255)->nullable();
            $table->string("address_street", 255)->nullable();
            $table->string("address_lane", 255)->nullable();
            $table->integer("postal_code")->unsigned()->nullable();
            $table->string("phone_number", 255)->nullable();

            $table->bigInteger("author_id")->unsigned();
            $table->foreign("author_id")->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('addresses');
    }
}
