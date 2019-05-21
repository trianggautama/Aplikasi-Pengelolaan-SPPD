<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    public function kabupaten(){
        return $this->belongsTo('App\kabupaten', 'id_kabupaten');
      }
}
