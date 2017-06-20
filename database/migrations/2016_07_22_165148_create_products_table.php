<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lrv12_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('author');
            $table->string('nhanvat');
            $table->string('namsx');
            $table->string('nhasx');
            $table->string('metatitle');
            $table->string('sotap')->default('??');
            $table->string('image');
            $table->string('trailer');
            $table->text('content');
            $table->string('intro');
            $table->integer('soluotxem')->default('1234');
            $table->boolean('status');
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('lrv12_categorys')->onDelete('cascade');
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
        Schema::drop('lrv12_products');
    }
}
