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
            $table->unsignedbigInteger('pejabat_id');
            $table->unsignedbigInteger('pegawai_id');
            $table->unsignedbigInteger('pangkat_id');
            $table->unsignedbigInteger('jabatan_id');
            $table->unsignedbigInteger('kegiatan_id');
            $table->unsignedbigInteger('transportasi_id');
            $table->unsignedbigInteger('tujuan_id');
            $table->unsignedbigInteger('anggaran_id');
            $table->string('keterangan');
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
