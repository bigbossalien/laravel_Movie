<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lrv12_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('metatitle');
            $table->text('intro');
            $table->text('content');
            $table->boolean('status');
            $table->integer('soluotxem')->default('1234');
            $table->string('image');
            $table->integer('user_id');
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
        Schema::drop('lrv12_news');
    }
}
