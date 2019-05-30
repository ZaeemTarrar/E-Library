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
            $table->increments('id');

            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('contact_number');
            $table->string('about')->nullable();
            $table->date('dob')->nullable();
            $table->boolean('gender')->default(1);
            $table->text('snap')->nullable();

            $table->rememberToken();
            $table->integer('role_id')->unsigned()->default(0);
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
        Schema::dropIfExists('users');
    }
}

