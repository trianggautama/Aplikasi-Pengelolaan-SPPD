<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{

    public function index(){

        return view('admin.index');
    }

    //pegawai
    public function pegawai_index(){

        return view('admin.pegawai_data');
    }

    public function pegawai_edit(){

        return view('admin.pegawai_edit');
    }

    //jabatan
    public function jabatan_index(){

        return view('admin.jabatan_data');
    }

    //provinsi
      public function provinsi_index(){

        return view('admin.provinsi_data');
    }


}
