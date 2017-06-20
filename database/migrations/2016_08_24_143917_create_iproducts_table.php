<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lrv12_iproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('source');
            $table->string('link');
            $table->string('image_prew');
            $table->text('tag');
            $table->integer('products_id')->unsigned();
            $table->foreign('products_id')->references('id')->on('lrv12_products')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('lrv12_users')->onDelete('cascade');
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
        Schema::drop('lrv12_iproducts');
    }
}
