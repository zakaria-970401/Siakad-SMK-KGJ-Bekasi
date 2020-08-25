<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TahunAjaran extends Model
{
    protected $table = 'tbl_tahunajaran';
   
        public $timestamps = false;
}
