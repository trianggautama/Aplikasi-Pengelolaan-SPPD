<?php

namespace App\Http\Controllers;

use IDCrypt;
Use App\User;
Use App\Jabatan;
Use App\Karyawan;
Use App\Anggaran;
Use App\Provinsi;
Use App\Kecamatan;
Use App\Kabupaten;
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
        return redirect(route('pegawai_index'))->with('success', 'Data Karyawan '.$request->nama.' Berhasil di ubah');
    }

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

        return redirect(route('anggaran_index'))->with('sukses', 'Data anggaran '.$request->anggaran.' Berhasil di Tambahkan');
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
        return redirect(route('anggaran_index'))->with('ubah', 'Data Anggaran '.$request->anggaran.' Berhasil di ubah');
    }

    public function anggaran_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $Anggaran=Anggaran::findOrFail($id);
        $Anggaran->delete();

        return redirect(route('anggaran_index'))->with('hapus', 'Data Anggaran Berhasil di hapus');
    }//fungsi menghapus data anggaran

    //provinsi
    public function provinsi_index(){
        $Provinsi = Provinsi::all();
        return view('admin.provinsi_data',compact('Provinsi'));
    }

    public function provinsi_tambah(Request $request){

        $this->validate(request(),[
          'provinsi'=>'required|unique:provinsis'
        ]);

        $Provinsi = new Provinsi;

        $Provinsi->kode_provinsi= $request->kode_provinsi;
        $Provinsi->provinsi= $request->provinsi;
        $Provinsi->save();

          return redirect(route('provinsi_index'))->with('sukses', 'Data Provinsi '.$request->provinsi.' Berhasil di Tambahkan');
      }//menambahkan data Provinsi

      public function provinsi_edit($id){
        $id = IDCrypt::Decrypt($id);
        $Provinsi = Provinsi::findOrFail($id);

        return view('admin.provinsi_edit',compact('Provinsi'));
       }//menampikan halaman edit Provinsi

       public function provinsi_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $Provinsi = Provinsi::findOrFail($id);

        $this->validate(request(),[
           'provinsi'=>'required'
       ]);

        $Provinsi->kode_provinsi= $request->kode_provinsi;
        $Provinsi->provinsi= $request->provinsi;
        $Provinsi->update();
       return redirect(route('provinsi_index'))->with('success', 'Data Provinsi '.$request->provinsi.' Berhasil di Ubah');
      }//mengubah data provinsi

       public function provinsi_hapus($id){
        $id = IDCrypt::Decrypt($id);
            $Provinsi=Provinsi::findOrFail($id);
            // $Provinsi->kabupaten()->delete();
            // $Provinsi->kecamatan()->delete();
            // $Provinsi->kelurahan()->delete();
            $Provinsi->delete();
            return redirect(route('provinsi_index'))->with('success', 'Data  Berhasil di Hapus');
       
    }  //menghapus data Provinsi

    //kabupaten
    public function kabupaten_index(){
        $Provinsi = Provinsi::all();
        $Kabupaten = Kabupaten::all();
        return view('admin.kabupaten_data',compact('Kabupaten','Provinsi'));
    }

    public function kabupaten_tambah(Request $request){

        $this->validate(request(),[
          'kode_kabupaten'=>'required|unique:kabupatens',
          'kabupaten'=>'required|unique:kabupatens'
        ]);

        $Kabupaten = new Kabupaten;

        $Kabupaten->id_provinsi= $request->id_provinsi;
        $Kabupaten->kode_kabupaten= $request->kode_kabupaten;
        $Kabupaten->kabupaten= $request->kabupaten;
        $Kabupaten->save();

          return redirect(route('kabupaten_index'))->with('success', 'Data Kabupaten '.$request->kabupaten.' Berhasil di Tambahkan');
      }//menambahkan data Kabupaten

      public function kabupaten_edit($id){
        $id = IDCrypt::Decrypt($id);
        $Kabupaten = Kabupaten::findOrFail($id);
        $Provinsi = Provinsi::all();

        return view('admin.kabupaten_edit',compact('Kabupaten','Provinsi'));
       }//menampikan halaman edit Kabupaten

       public function kabupaten_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $Kabupaten = Kabupaten::findOrFail($id);

        $this->validate(request(),[
           'kabupaten'=>'required'
       ]);

        $Kabupaten->id_provinsi= $request->id_provinsi;
        $Kabupaten->kode_kabupaten= $request->kode_kabupaten;
        $Kabupaten->kabupaten= $request->kabupaten;
        $Kabupaten->update();
       return redirect(route('kabupaten_index'))->with('success', 'Data Kabupaten '.$request->kabupaten.' Berhasil di Ubah');
      }//mengubah data kabupaten

       public function kabupaten_hapus($id){
        $id = IDCrypt::Decrypt($id);
            $Kabupaten=Kabupaten::findOrFail($id);
            // $Kabupaten->kabupaten()->delete();
            // $Kabupaten->kecamatan()->delete();
            // $Kabupaten->kelurahan()->delete();
            $Kabupaten->delete();
            return redirect(route('kabupaten_index'))->with('success', 'Data  Berhasil di Hapus');
       
    }  //menghapus data Kabupaten

    //kecamatan
    public function kecamatan_index(){
        $Kecamatan = Kecamatan::all();
        $Kabupaten = Kabupaten::all();
        return view('admin.kecamatan_data',compact('Kecamatan','Kabupaten'));
    }//menampikan data kecamatan


    public function kecamatan_tambah(Request $request){

        $this->validate(request(),[
          'kode_kecamatan'=>'required|unique:kecamatans',
          'kecamatan'=>'required|unique:kecamatans'
        ]);

        $kecamatan = new kecamatan;
        $kecamatan->id_kabupaten= $request->id_kabupaten;
        $kecamatan->kode_kecamatan= $request->kode_kecamatan;
        $kecamatan->kecamatan= $request->kecamatan;
        $kecamatan->save();

          return redirect(route('kecamatan_index'))->with('sukses', 'Data kecamatan '.$request->nama_kecamatan.' Berhasil di Tambahkan');
      }//menambahkan data kecamatan

      public function kecamatan_edit($id){
        $id = IDCrypt::Decrypt($id);
        $Kecamatan = Kecamatan::findOrFail($id);
        $Kabupaten = Kabupaten::All();

        return view('admin.kecamatan_edit',compact('Kecamatan','Kabupaten'));
       }//menampikan halaman edit kecamatan

       public function kecamatan_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $Kecamatan = Kecamatan::findOrFail($id);

        $this->validate(request(),[
           'kecamatan'=>'required'
       ]);
       $Kecamatan->id_kabupaten= $request->id_kabupaten;
       $Kecamatan->kode_kecamatan= $request->kode_kecamatan;
       $Kecamatan->kecamatan= $request->kecamatan;
    //    dd($Kecamatan);
       $Kecamatan->update();
       return redirect(route('kecamatan_index'))->with('ubah', 'Data kecamatan '.$request->kecamatan.' Berhasil di Ubah');
      }//mengubah data kecamatan

      public function kecamatan_hapus($id){
        $id = IDCrypt::Decrypt($id);
            $Kecamatan=kecamatan::findOrFail($id);
            // $Kecamatan->kelurahan()->delete();
            $Kecamatan->delete();
            return redirect(route('kecamatan_index'))->with('hapus', 'Data  Berhasil di Hapus');

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

          return redirect(route('kelurahan-index'))->with('sukses', 'Data kelurahan '.$request->nama_kelurahan.' Berhasil di Tambahkan');
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
        return redirect(route('kelurahan-index'))->with('hapus', 'Data kecamatan '.$nama_kelurahan.' Berhasil di Hapus');
    } //menghapus data kelurahan


}
