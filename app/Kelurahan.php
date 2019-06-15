<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table ='kelurahans';
    protected $fillable = [
        'kode_kelurahan','kelurahan','kecamatan_id',
    ];
    
    public function kecamatan(){
        return $this->belongsTo('App\kecamatan', 'kecamatan_id');
      }
}
