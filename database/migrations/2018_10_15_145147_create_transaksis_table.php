<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('link_id');
            $table->foreign('link_id')->references('id')->on('links')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama',255)->nullable();
            $table->string('email')->unique();
            $table->string('tlp')->nullable;
            $table->string('ispaid')->default('n');
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
        Schema::dropIfExists('transaksis');
    }
}
