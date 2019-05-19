<?php

namespace App\Http\Controllers;

use IDCrypt;
Use App\User;
Use App\Jabatan;
Use App\Karyawan;
Use App\Anggaran;
Use App\Provinsi;
Use App\Kecamatan;
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

        return redirect(route('pegawai_index'))->with('sukses', 'Data Karyawan '.$request->nama.' Berhasil di Tambahkan');
    }//fungsi menambahkan data pegawai

    public function pegawai_edit($id){
        $id = IDCrypt::Decrypt($id);
        $Karyawan = Karyawan::findOrFail($id);
        $Jabatan = Jabatan::all();
        return view('admin.pegawai_edit',compact('Jabatan','Karyawan'));
    }
    public function pegawai_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $Karyawan = Karyawan::findOrFail($id);

         $this->validate(request(),[
            'nip'=>'required',
            'nama'=>'required',
            'id_jabatan'=>'required'
        ]);

        $Karyawan->id_jabatan   = $request->id_jabatan;
        $Karyawan->nip = $request->nip;
        $Karyawan->nama = $request->nama;
        $Karyawan->update();
<<<<<<< HEAD
        return redirect(route('jabatan_index'))->with('ubah', 'Data Karyawan '.$request->jabatan.' Berhasil di ubah');
    }
=======
        return redirect(route('pegawai_index'))->with('success', 'Data Karyawan '.$request->nama.' Berhasil di ubah');
    } 
>>>>>>> 1238c66f502301994d74db2c74d4e1bc61003c49

    public function pegawai_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $Karyawan=Karyawan::findOrFail($id);
        $Karyawan->delete();

        return redirect(route('jabatan_index'))->with('hapus', 'Data jabatan Berhasil di hapus');
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

        return redirect(route('jabatan_index'))->with('sukses', 'Data jabatan '.$request->jabatan.' Berhasil di Tambahkan');
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
        return redirect(route('jabatan_index'))->with('ubah', 'Data Jabatan '.$request->jabatan.' Berhasil di ubah');
    }

    public function jabatan_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $Jabatan=Jabatan::findOrFail($id);
        // File::delete('images/rambu/'.$rambu->gambar);
        // $rambu->lokasi_rambu()->delete();
        $Jabatan->delete();

        return redirect(route('jabatan_index'))->with('hapus', 'Data jabatan Berhasil di hapus');
    }//fungsi menghapus data jabatan

    //Anggaran
    public function anggaran_index(){
        $Anggaran = Anggaran::all();
        return view('admin.anggaran_data',compact('Anggaran'));
    }

    public function anggaran_tambah(Request $request){

        $this->validate(request(),[
            'pembebanan'=>'required',
            'akun'=>'required',
            'tahun'=>'required'
            
        ]);
    
        $Anggaran = new Anggaran;

        $Anggaran->pembebanan   = $request->pembebanan;
        $Anggaran->akun         = $request->akun;
        $Anggaran->tahun        = $request->tahun;
        $Anggaran->save();
           
        return redirect(route('anggaran_index'))->with('success', 'Data anggaran '.$request->anggaran.' Berhasil di Tambahkan');
    }//fungsi menambahkan data anggaran

    public function anggaran_edit($id){
        $id = IDCrypt::Decrypt($id);
        $Anggaran = Anggaran::findOrFail($id);
        return view('admin.anggaran_edit',['Anggaran' => $Anggaran]);
    }

    public function anggaran_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $Anggaran = Anggaran::findOrFail($id);

         $this->validate(request(),[
            'pembebanan'=>'required',
            'akun'=>'required',
            'tahun'=>'required'
        ]);

        $Anggaran->pembebanan   = $request->pembebanan;
        $Anggaran->akun         = $request->akun;
        $Anggaran->tahun        = $request->tahun;
        $Anggaran->update();
        return redirect(route('anggaran_index'))->with('success', 'Data Anggaran '.$request->anggaran.' Berhasil di ubah');
    } 

    public function anggaran_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $Anggaran=Anggaran::findOrFail($id);
        $Anggaran->delete();
       
        return redirect(route('anggaran_index'))->with('success', 'Data Anggaran Berhasil di hapus');
    }//fungsi menghapus data anggaran
    
    //provinsi
    public function provinsi_index(){
        $Provinsi = Provinsi::all();
        return view('admin.provinsi_data',compact('Provinsi'));
    }

    public function provinsi_tambah(Request $request){

        $this->validate(request(),[
          'provinsi'=>'required|unique:kecamatan'
        ]);

        $Provinsi = new Provinsi;

        $Provinsi->kode_provinsi= $request->kode_provinsi;
        $Provinsi->provinsi= $request->provinsi;
        $Provinsi->save();
       
          return redirect(route('provinsi_index'))->with('success', 'Data Provinsi '.$request->provinsi.' Berhasil di Tambahkan');
      }//menambahkan data Provinsi

    //kecamatan
    public function kecamatan_index(){
        $Kecamatan = Kecamatan::all();
        return view('admin.kecamatan_data',compact('Kecamatan'));
    }//menampikan data kecamatan

    
    public function kecamatan_tambah(Request $request){

        $this->validate(request(),[
          'nama_kecamatan'=>'required|unique:kecamatan'
        ]);

        $kecamatan = new kecamatan;
        $kecamatan->nama_kecamatan= $request->nama_kecamatan;
        $kecamatan->save();
       
          return redirect(route('kecamatan-index'))->with('success', 'Data kecamatan '.$request->nama_kecamatan.' Berhasil di Tambahkan');
      }//menambahkan data kecamatan

      public function kecamatan_edit($id){
        $id = IDCrypt::Decrypt($id);
        $kecamatan = kecamatan::findOrFail($id);

        return view('lokasi.kecamatan_edit',compact('kecamatan'));
       }//menampikan halaman edit kecamatan

      public function kecamatan_detail($id){
        $id = IDCrypt::Decrypt($id);
        $kecamatan = kecamatan::findOrFail($id);
        $kelurahan = kelurahan:: with('lokasi_rambu')
                                ->where('kecamatan_id',$id)
                                ->get();
        $lokasi= $kelurahan->flatten(2);
        $lokasi->values()->all();
        
      return view('lokasi.kecamatan_detail',compact('lokasi','kecamatan'));
       }//melihat data kelurahan pada kecamatan tertentu

       public function kecamatan_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $kecamatan = kecamatan::findOrFail($id);

        $this->validate(request(),[
           'nama_kecamatan'=>'required'
       ]);
       $kecamatan->nama_kecamatan= $request->nama_kecamatan;
       $kecamatan->update();
       return redirect(route('kecamatan-index'))->with('success', 'Data kecamatan '.$request->nama_kecamatan.' Berhasil di Ubah');
      }//mengubah data kecamatan

       public function kecamatan_hapus($id){
        $id = IDCrypt::Decrypt($id);
            $kecamatan=kecamatan::findOrFail($id);
            $kecamatan->kelurahan()->delete();
            $kecamatan->delete();
            return redirect(route('kecamatan-index'))->with('success', 'Data  Berhasil di Hapus');
       
    }  //menghapus data  kecamatan


     //kelurahan

     public function kelurahan_index(){
        $kelurahan = kelurahan::all();
        $kecamatan = kecamatan::all();

        return view('lokasi.kelurahan',compact('kelurahan','kecamatan'));
    }//menampilkan data kelurahan

    
    public function kelurahan_tambah(Request $request){

        $this->validate(request(),[
          'nama_kelurahan'=>'required|unique:kelurahan',
          'kecamatan_id'=>'required'

        ]);

        $kelurahan = new kelurahan;
        $kelurahan->nama_kelurahan= $request->nama_kelurahan;
        $kelurahan->kecamatan_id= $request->kecamatan_id;

        $kelurahan->save();
       
          return redirect(route('kelurahan-index'))->with('success', 'Data kelurahan '.$request->nama_kelurahan.' Berhasil di Tambahkan');
      }//menambah data kelurahan

      public function kelurahan_detail($id){
        $id = IDCrypt::Decrypt($id);
        $kelurahan = kelurahan::findOrFail($id);
        $lokasi_rambu= lokasi_rambu::where('kelurahan_id',$id)->get();
        return view('lokasi.kelurahan_detail',compact('kelurahan','lokasi_rambu'));
       }//melihat data rambu pada elurahan tertentu

       public function kelurahan_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $kelurahan=kelurahan::findOrFail($id);
        $nama_kelurahan=$kelurahan->nama_kelurahan;
        $kelurahan->lokasi_rambu()->delete();
        $kelurahan->delete();
        return redirect(route('kelurahan-index'))->with('success', 'Data kecamatan '.$nama_kelurahan.' Berhasil di Hapus');
    } //menghapus data kelurahan



}
