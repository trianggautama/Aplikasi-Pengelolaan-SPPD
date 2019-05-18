<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    public function jabatan(){
        return $this->belongsTo('App\Jabatan', 'id_jabatan');
      }
}
