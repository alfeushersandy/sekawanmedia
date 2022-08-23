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
        Schema::create('master_kendaraan', function (Blueprint $table) {
            $table->id('id_kendaraan');
            $table->string('nama_kendaraan');
            $table->string('nopol');
            $table->string('jenis_aset');
            $table->string('status_aset');
            $table->timestamp('pekerjaan_terakhir')->nullable();
            $table->timestamp('konsumsi_bbm_terakhir')->nullable();
            $table->timestamp('service_terakhir')->nullable();
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
        Schema::dropIfExists('master_kendaraan');
    }
};
