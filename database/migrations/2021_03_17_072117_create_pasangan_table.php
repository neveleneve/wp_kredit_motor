<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasangan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik_nasabah', 16);
            $table->string('nama', 50);
            $table->date('tgl_lahir');
            $table->string('no_hp', 16);
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
        Schema::dropIfExists('pasangan');
    }
}
