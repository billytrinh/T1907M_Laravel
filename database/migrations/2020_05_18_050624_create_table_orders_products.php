<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrdersProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_products', function (Blueprint $table) {
//            $table->id();
            $table->unsignedBigInteger("order_id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedInteger("qty");
            $table->decimal("price",12,4);
            $table->timestamps();
            $table->foreign("order_id")->references("id")->on("orders");
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_products');
    }
}
