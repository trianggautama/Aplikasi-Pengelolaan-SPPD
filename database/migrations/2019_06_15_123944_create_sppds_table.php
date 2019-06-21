<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSppdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sppds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('karyawan_id');
            $table->unsignedbigInteger('anggaran_id');
            $table->unsignedbigInteger('kegiatan_id');
            $table->unsignedbigInteger('tujuan_id');
            $table->unsignedbigInteger('transportasi_id');
            $table->unsignedbigInteger('pejabat_id');
            $table->string('kode_sppd')->length(20);
            $table->date('tgl_berangkat');
            $table->date('tgl_kembali');
            $table->string('keterangan')->length(191);
            $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('cascade');
            $table->foreign('anggaran_id')->references('id')->on('anggarans')->onDelete('cascade');
            $table->foreign('kegiatan_id')->references('id')->on('kegiatans')->onDelete('cascade');
            $table->foreign('tujuan_id')->references('id')->on('tujuans')->onDelete('cascade');
            $table->foreign('transportasi_id')->references('id')->on('transportasis')->onDelete('cascade');
            $table->foreign('pejabat_id')->references('id')->on('pejabats')->onDelete('cascade');
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
        Schema::dropIfExists('sppds');
    }
}
