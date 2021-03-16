<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table): void {
            $table->id();

            $table->bigInteger("category_id")->unsigned();
            $table->foreign("category_id")->references('id')->on('categories')->onDelete('cascade');
            
            $table->string("title", 255);
            $table->double("price", 15, 8);
            $table->double("sale_price", 15, 8)->nullable();
            $table->longText("description");
            $table->double("rating", 15, 8)->nullable();
            $table->boolean("is_active")->default(true);

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
        Schema::dropIfExists('products');
    }
}
