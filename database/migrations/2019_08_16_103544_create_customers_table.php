<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('owner_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address')->nullable();
            $table->integer('housenumber')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('city')->nullable();
            $table->integer('phonenumber')->unique()->nullable();
            $table->integer('mobile')->unique()->nullable();
            $table->string('email', 100)->unique();
            $table->timestamp('dateofbirth')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
