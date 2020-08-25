<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
    {
        use Notifiable;
        public $timestamps = false;


        protected $guard = 'admin';

        protected $fillable = [
            'nama','jeniskelamin', 'agama', 'email', 'password', 'foto',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
    }