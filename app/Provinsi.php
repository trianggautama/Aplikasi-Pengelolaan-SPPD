<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    public function kecamatan(){
        return $this->hasMany('App\kecamatan');
      }
}
