<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTahunHargaKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahun_harga_kendaraan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_tipe_kendaraan');
            $table->integer('tahun');
            $table->integer('harga_otr');
            $table->integer('maks_pencairan');
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
        Schema::dropIfExists('tahun_harga_kendaraan');
    }
}
