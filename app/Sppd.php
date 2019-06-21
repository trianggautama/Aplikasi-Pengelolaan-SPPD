<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    protected $table ='sppds';
    protected $fillable = [
        'kode_sppd','karyawan_id','anggaran_id','kegiatan_id','tgl_berangkat','tgl_kembali',
    ];
    
    public function karyawan(){
        return $this->belongsTo('App\karyawan', 'karyawan_id');
      }
    
    public function anggaran(){
        return $this->belongsTo('App\anggaran', 'anggaran_id');
      }  
     
    public function kegiatan(){
        return $this->belongsTo('App\kegiatan', 'kegiatan_id');
      }    

    public function tujuan(){
        return $this->belongsTo('App\tujuan', 'tujuan_id');
      }      

    public function transportasi(){
        return $this->belongsTo('App\transportasi', 'transportasi_id');
      }    
      
    public function pejabat(){
        return $this->belongsTo('App\pejabat', 'pejabat_id');
      }      
}


