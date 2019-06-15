<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table ='kabupatens';
    protected $fillable = [
        'kode_kabupaten','kabupaten','provinsi_id',
    ];
    
    public function provinsi(){
      return $this->BelongsTo('App\Provinsi');
    }
    // public function kecamatan(){
    //     return $this->hasMany('App\kecamatan','id_kabupaten');
    //   }
}
