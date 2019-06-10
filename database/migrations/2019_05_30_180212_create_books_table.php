<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('author');
            $table->string('file');
            $table->string('recommendation');
            $table->integer('pages')->unsigned()->default(0);
            $table->boolean('active')->default(1);

            //Relations
            $table->integer('grade_id')->unsigned()->default(0);
            $table->integer('language_id')->unsigned()->default(0);
            $table->integer('category_id')->unsigned()->default(0);
            $table->integer('user_id')->unsigned()->default(0);

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
        Schema::dropIfExists('books');
    }
}
