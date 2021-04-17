<?php

use App\Models\Cart;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger("author_id")->unsigned();            
            $table->foreign("author_id")->references("id")->on("users")->onDelete("cascade");
            
            $table->bigInteger("address_id")->unsigned();            
            $table->foreign("address_id")->references("id")->on("addresses")->onDelete("cascade");

            $table->integer("quantity_orders");
            $table->string("sum", 255);
            $table->string("status", 255)->default(Cart::STATUS_WAITING);

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
        Schema::dropIfExists('carts');
    }
}
