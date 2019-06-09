<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    
    public function kecamatan(){
        return $this->hasMany('App\kecamatan','id_kabupaten');
      }
}
