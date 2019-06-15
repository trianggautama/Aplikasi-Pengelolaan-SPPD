<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    public function provinsi(){
        return $this->belongsTo('App\provinsi', 'provinsi_id');
      }
    
    public function kabupaten(){
        return $this->belongsTo('App\kabupaten', 'kabupaten_id');
      }

    public function kecamatan(){
        return $this->belongsTo('App\kecamatan', 'kecamatan_id');
      }

    public function kelurahan(){
        return $this->belongsTo('App\kelurahan', 'kelurahan_id');
      }
}
