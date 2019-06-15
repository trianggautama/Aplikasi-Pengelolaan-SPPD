<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePejabatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pejabats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_pejabat')->length(20);
            $table->string('nip')->length(25);
            $table->string('nama')->length(191);
            $table->string('jabatan')->length(191);
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
        Schema::dropIfExists('pejabats');
    }
}
