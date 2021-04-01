<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('picture');
            $table->string('title');
            $table->string('body',5000);
            $table->integer('u_id')->unsigned();
            $table->foreign('u_id')->references('id')->on('users');
            $table->boolean('status')->default(0);
            $table->integer('sellers_id')->unsigned()->nullable();
            $table->foreign('sellers_id')->references('id')->on('sellers');
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
        Schema::dropIfExists('blogs');
    }
}
