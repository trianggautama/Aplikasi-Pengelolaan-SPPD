<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    public function karyawan(){
        return $this->hasMany('App\Karyawan');
      }
}
