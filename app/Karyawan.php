<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    public function pangkat(){
        return $this->belongsTo('App\Pangkat', 'pangkat_id');
      }
    
    public function jabatan(){
        return $this->belongsTo('App\Jabatan', 'jabatan_id');
      }  
}
