<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTujuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tujuans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('provinsi_id');
            $table->unsignedbigInteger('kabupaten_id');
            $table->unsignedbigInteger('kecamatan_id');
            $table->unsignedbigInteger('kelurahan_id');
            $table->string('kode_tujuan')->length('20');
            $table->string('tujuan')->length('50');
            $table->foreign('provinsi_id')->references('id')->on('provinsis')->onDelete('cascade');
            $table->foreign('kabupaten_id')->references('id')->on('kabupatens')->onDelete('cascade');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('cascade');
            $table->foreign('kelurahan_id')->references('id')->on('kelurahans')->onDelete('cascade');
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
        Schema::dropIfExists('tujuans');
    }
}
