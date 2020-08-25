<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelSiswa extends Model
{
    protected $table = 'tbl_datasiswa';

    public $timestamps = false;
    protected $fillable = [
        'namasiswa','nisn', 'jurusan', 'kelas', 'kotakelahiran', 'tgllahir', 'jeniskelamin', 'agama', 'namaayah',  'namaibu', 'anakke', 'alamatortu', 'no_teleponortu', 'pekerjaanayah', 'pekerjaanibu', 'foto' ];
}
