<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("product_name");
            $table->text("product_desc");
            $table->decimal("price",12,4);
            $table->unsignedInteger("qty")->default(1);
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("brand_id");
            $table->timestamps();
            $table->foreign("category_id")->references("id")->on("categories");
            $table->foreign("brand_id")->references("id")->on("brands");
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
