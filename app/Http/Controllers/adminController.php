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

}
