<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaguru');
            $table->string('nuptk');
            $table->string('jabatan');
            $table->string('Kotakelahiran');
            $table->string('jeniskelamin');
            $table->string('mapel');
            $table->date('tgllahir');
            $table->string('agama');
            $table->string('alamat');
            $table->string('pendidikan');
            $table->string('nohp');
            $table->string('email');
            $table->string('password');
            $table->string('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
