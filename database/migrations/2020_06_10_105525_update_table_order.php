<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string("username")->after("user_id");
            $table->text("address")->after("username");
            $table->string("telephone")->after("address");
            $table->text("note")->after("telephone")->nullable();
            $table->unsignedInteger("status")->default(0)->after("grand_total");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['username']);
            $table->dropColumn(['address']);
            $table->dropColumn(['telephone']);
            $table->dropColumn(['note']);
            $table->dropColumn(['status']);
        });
    }
}
