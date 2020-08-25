<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Absensi extends Model
{
    use Notifiable;
    public $timestamps = false;

    protected $table		= 'tbl_absensi';
    protected $fillable		= ['id', 'namasiswa', 'nisn', 'kelas', 'tglabsen', 'jam_masuk', 'jam_keluar', 'sakit', 'izin', 'keterangan', 'status_konfirmasi'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
