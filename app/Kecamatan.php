<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table ='kecamatans';
    protected $fillable = [
        'kode_kecamatan','kecamatan','kabupaten_id',
    ];
    
    public function kabupaten(){
        return $this->belongsTo('App\kabupaten', 'kabupaten_id');
      }

    // public function kelurahan(){
    //     return $this->hasMany('App\kelurahan','id_kecamatan');
    //   }  
}
