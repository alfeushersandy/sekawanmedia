<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_permintaan_kendaraan', function (Blueprint $table) {
            $table->id('id_permintaan');
            $table->date('tanggal');
            $table->string('pemohon');
            $table->string('keperluan');
            $table->unsignedBigInteger('kendaraan_id');
            $table->unsignedBigInteger('driver_id');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->boolean('approval_1');
            $table->boolean('approval_2');
            $table->timestamps();

            $table->foreign('kendaraan_id')->references('id_kendaraan')->on('master_kendaraan');
            $table->foreign('driver_id')->references('id_driver')->on('driver');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaan_kendaraan');
    }
};
