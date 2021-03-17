<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNasabahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nasabah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_marketing');
            $table->string('nik', 16);
            $table->string('nama', 50);
            $table->string('jenis_kelamin', 1);
            $table->integer('status_nikah');
            $table->string('tmpt_lahir', 50);
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
        Schema::dropIfExists('nasabah');
    }
}
