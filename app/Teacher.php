<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
    {
        use Notifiable;
        public $timestamps = false;


        protected $guard = 'teacher';

        protected $fillable = [
            'namaguru','nuptk', 'jabatan', 'mapel', 'jeniskelamin', 'agama', 'tgllahir', 'Kotakelahiran', 'alamat', 'pendidikan', 'nohp',  'email', 'password', 'foto',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
    }