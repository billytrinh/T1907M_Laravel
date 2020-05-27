<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('email_verified_at')->nullable()->after("email");
            $table->rememberToken()->after("password");
            $table->string("image")->nullable()->after("name");
            $table->text("address")->nullable()->after("email");
            $table->string("telephone")->nullable()->after("email");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(["email_verified_at"]);
            $table->dropRememberToken();
            $table->dropColumn(["image"]);
            $table->dropColumn(["address"]);
            $table->dropColumn(["telephone"]);
        });
    }
}
