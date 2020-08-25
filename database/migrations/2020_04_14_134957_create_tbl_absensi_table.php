<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_absensi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('namasiswa');
            $table->integer('nisn');
            $table->date('tglabsen');            
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->boolean('sakit')->default(0);
            $table->boolean('izin')->default(0);
            $table->String('keterangan');
            $table->boolean('status_absen')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_absensi');
    }
}
