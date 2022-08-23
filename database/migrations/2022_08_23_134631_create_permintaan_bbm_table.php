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
        Schema::create('permintaan_bbm', function (Blueprint $table) {
            $table->id('id_permintaan_bbm');
            $table->date('tanggal');
            $table->unsignedBigInteger('permintaan_id');
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('permintaan_id')->references('id_permintaan')->on('tb_permintaan_kendaraan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaan_bbm');
    }
};
