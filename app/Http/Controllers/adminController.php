<?php

namespace App\Http\Controllers;

use IDCrypt;
Use App\User;
Use App\Jabatan;
Use App\Karyawan;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        return view('admin.index');
    }

    //pegawai
    public function pegawai_index(){
        $Karyawan = Karyawan::all();
        $Jabatan = Jabatan::all();
        return view('admin.pegawai_data',compact('Karyawan','Jabatan'));
    }

    public function pegawai_tambah(Request $request){

        $this->validate(request(),[
            'nip'=>'required|unique:karyawans',
            'nama'=>'required',
            'id_jabatan'=>'required'
        ]);
    
        $Karyawan = new Karyawan;

        $Karyawan->id_jabatan   = $request->id_jabatan;
        $Karyawan->nip          = $request->nip;
        $Karyawan->nama         = $request->nama;
        $Karyawan->save();
           
        return redirect(route('pegawai_index'))->with('success', 'Data Karyawan '.$request->nama.' Berhasil di Tambahkan');
    }//fungsi menambahkan data pegawai

    public function pegawai_edit($id){
        $id = IDCrypt::Decrypt($id);
        $Karyawan = Karyawan::findOrFail($id);
        return view('admin.pegawai_edit',['Karyawan' => $Karyawan]);
    }

    public function pegawai_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $Karyawan = Karyawan::findOrFail($id);

         $this->validate(request(),[
            'kode_jabatan'=>'required',
            'jabatan'=>'required'
        ]);

        $Karyawan->kode_jabatan = $request->kode_jabatan;
        $Karyawan->jabatan = $request->jabatan;
        $Karyawan->update();
        return redirect(route('jabatan_index'))->with('success', 'Data Karyawan '.$request->jabatan.' Berhasil di ubah');
    } 

    public function pagawai_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $Karyawan=Karyawan::findOrFail($id);
        // File::delete('images/rambu/'.$rambu->gambar);
        // $rambu->lokasi_rambu()->delete();
        $Karyawan->delete();
       
        return redirect(route('jabatan_index'))->with('success', 'Data jabatan Berhasil di hapus');
    }//fungsi menghapus data jabatan

    //jabatan
    public function jabatan_index(){
        $Jabatan = Jabatan::all();
        return view('admin.jabatan_data',['Jabatan' => $Jabatan]);
    }

    public function jabatan_tambah(Request $request){

        $this->validate(request(),[
            'kode_jabatan'=>'required|unique:jabatans',
            'jabatan'=>'required|unique:jabatans',
        ]);
    
        $Jabatan = new Jabatan;

        $Jabatan->kode_jabatan  = $request->kode_jabatan;
        $Jabatan->jabatan       = $request->jabatan;
        $Jabatan->save();
           
        return redirect(route('jabatan_index'))->with('success', 'Data jabatan '.$request->jabatan.' Berhasil di Tambahkan');
    }//fungsi menambahkan data jabatan

    public function jabatan_edit($id){
        $id = IDCrypt::Decrypt($id);
        $Jabatan = Jabatan::findOrFail($id);
        return view('admin.jabatan_edit',['Jabatan' => $Jabatan]);
    }

    public function jabatan_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $Jabatan = Jabatan::findOrFail($id);

         $this->validate(request(),[
            'kode_jabatan'=>'required',
            'jabatan'=>'required'
        ]);

        $Jabatan->kode_jabatan = $request->kode_jabatan;
        $Jabatan->jabatan = $request->jabatan;
        $Jabatan->update();
        return redirect(route('jabatan_index'))->with('success', 'Data Jabatan '.$request->jabatan.' Berhasil di ubah');
    } 

    public function jabatan_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $Jabatan=Jabatan::findOrFail($id);
        // File::delete('images/rambu/'.$rambu->gambar);
        // $rambu->lokasi_rambu()->delete();
        $Jabatan->delete();
       
        return redirect(route('jabatan_index'))->with('success', 'Data jabatan Berhasil di hapus');
    }//fungsi menghapus data jabatan

    //provinsi
      public function provinsi_index(){

        return view('admin.provinsi_data');
    }


}
