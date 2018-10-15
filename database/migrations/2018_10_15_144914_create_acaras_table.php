<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acaras', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama',255)->nullable();
            $table->Integer('kapasitas')->nullable();
            $table->string('jenis_acara',255)->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->time('wkt_mulai')->nullable();
            $table->time('wkt_selesai')->nullable();
            $table->string('deskripsi',600)->nullable();                                  
            $table->timestamps();
        });
    }

    // $table->unsignedInteger('mkaryawan_id')->nullable();
    // $table->foreign('mkaryawan_id')->references('id')->on('mkaryawans')->onUpdate('cascade')->onDelete('cascade');

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acaras');
    }
}
