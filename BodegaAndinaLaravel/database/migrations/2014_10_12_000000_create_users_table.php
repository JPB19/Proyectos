<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('user');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar');
            $table->string('country');
            $table->string('city')->nullable();
            $table->tinyInteger('isadmin')->nullable()->default(0);
            // $table->string('bill');
            $table->rememberToken();
            $table->timestamps();
        });
    }

// acá hay que poner cada uno de los items con las especificaciones porque
// esto es lo que modela la base de datos.

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
