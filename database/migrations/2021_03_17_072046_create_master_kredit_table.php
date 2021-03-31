<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterKreditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_kredit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_marketing');
            $table->string('trx_code');
            $table->string('nik_nasabah', 16);
            $table->string('penilaian');
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
        Schema::dropIfExists('master_kredit');
    }
}
