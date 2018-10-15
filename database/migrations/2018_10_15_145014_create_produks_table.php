<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('acara_id');
            $table->foreign('acara_id')->references('id')->on('acaras')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama',255)->nullable();
            $table->Integer('harga')->nullable();
            $table->Integer('jumlah')->nullable();
            $table->string('deskripsi')->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->Integer('komisi_awal')->nullable();
            $table->string('tipe_komisi',255)->nullable();
            $table->Integer('komisi_tambah')->nullable();
            $table->Integer('max_kelipatan')->nullable();
            $table->Integer('kelipatan')->nullable();

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
        Schema::dropIfExists('produks');
    }
}
