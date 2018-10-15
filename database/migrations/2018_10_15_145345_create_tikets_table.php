<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_tiket')->nullable();
            $table->unsignedInteger('dtransaksi_id');
            $table->foreign('dtransaksi_id')->references('id')->on('dtransaksis')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('tlp')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('no_ktp')->nullable();                    
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
        Schema::dropIfExists('tikets');
    }
}
