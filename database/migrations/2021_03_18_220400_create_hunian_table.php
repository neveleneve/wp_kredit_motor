<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHunianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hunian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik_nasabah', 16);
            $table->string('status_kepemilikan');
            $table->string('bukti_kepemilikan');
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
        Schema::dropIfExists('hunian');
    }
}
