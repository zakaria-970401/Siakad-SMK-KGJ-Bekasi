<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namasiswa');
            $table->Integer('nisn');
            $table->string('jeniskelamin');
            $table->string('nohp');
            $table->string('alamat');
            $table->string('agama');
            $table->string('jurusan');
            $table->string('kelas');
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
        Schema::dropIfExists('users');
    }
}
