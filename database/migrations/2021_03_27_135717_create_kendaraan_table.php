<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('trx_code');
            $table->string('nik_nasabah', 16);
            $table->integer('merk');
            $table->integer('tipe');
            $table->string('tahun');
            $table->string('nopol');
            $table->date('tgl_pajak');
            $table->date('tgl_stnk');
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
        Schema::dropIfExists('kendaraan');
    }
}
