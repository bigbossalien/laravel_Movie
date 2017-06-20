<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lrv12_footer', function (Blueprint $table) {
            $table->increments('id');
            $table->text('gioithieu');
            $table->text('lhqc');
            $table->string('facebook');
            $table->string('google');
            $table->string('twitter');
            $table->text('dksd');
            $table->text('csrt');
            $table->text('banquyen');
            $table->text('fqas');
            $table->text('lienhe');
            $table->string('baoloi');
            $table->string('donggop');
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
        Schema::drop('lrv12_footer');
    }
}
