<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelNilai extends Model
{
    protected $table = 'tbl_nilai';
    protected $fillable = [
        'id_tahunajaran', 'id_semester', 'nisn','namasiswa', 'kelas', 'mapel', 'nilai_uas', 'nilai_uas', 'nilai_praktek', 'nilai_tugas',  'nilai_harian'];
    public $timestamps = false;
}

