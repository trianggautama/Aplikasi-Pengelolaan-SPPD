<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    public function provinsi(){
        return $this->belongsTo('App\provinsi', 'id_provinsi');
      }
      
    public function kecamatan(){
        return $this->hasMany('App\kecamatan');
      }
}
