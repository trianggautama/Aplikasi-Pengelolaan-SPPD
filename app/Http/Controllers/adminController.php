<?php

namespace App\Http\Controllers;

use IDCrypt;
Use App\User;
Use App\Sppd;
Use App\Pangkat;
Use App\Jabatan;
Use App\Karyawan;
Use App\Anggaran;
Use App\Kegiatan;
Use App\Provinsi;
Use App\Kecamatan;
Use App\Kabupaten;
Use App\Kelurahan;
Use App\Tujuan;
Use App\Transportasi;
Use App\Pejabat;

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
        $Pangkat = Pangkat::all();
        $Jabatan = Jabatan::all();
        return view('admin.pegawai_data',compact('Karyawan','Pangkat','Jabatan'));
    }

    public function pegawai_tambah(Request $request){

        $this->validate(request(),[
            'nip'=>'required|unique:karyawans',
            'nama'=>'required',
            'pangkat_id'=>'required',
            'jabatan_id'=>'required'
        ]);

        $Karyawan = new Karyawan;

        $Karyawan->pangkat_id   = $request->pangkat_id;
        $Karyawan->jabatan_id   = $request->jabatan_id;
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

    //pangkat
    public function pangkat_index(){
        $Pangkat = Pangkat::all();
        return view('admin.pangkat_data',compact('Pangkat'));
    }

    public function pangkat_tambah(Request $request){

        $this->validate(request(),[
            'kode_pangkat'=>'required|unique:pangkats',
            'pangkat'=>'required|unique:pangkats',
        ]);

        $Pangkat = new Pangkat;

        $Pangkat->kode_pangkat  = $request->kode_pangkat;
        $Pangkat->pangkat       = $request->pangkat;
        $Pangkat->save();

        return redirect(route('pangkat_index'))->with('sukses', 'Data pangkat '.$request->pangkat.' Berhasil di Tambahkan');
    }//fungsi menambahkan data pangkat

    public function pangkat_edit($id){
        $id = IDCrypt::Decrypt($id);
        $Pangkat = Pangkat::findOrFail($id);
        return view('admin.pangkat_edit',['Pangkat' => $Pangkat]);
    }

    public function pangkat_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $Pangkat = Pangkat::findOrFail($id);

         $this->validate(request(),[
            'kode_pangkat'=>'required',
            'pangkat'=>'required'
        ]);

        $Pangkat->kode_pangkat = $request->kode_pangkat;
        $Pangkat->pangkat = $request->pangkat;
        $Pangkat->update();
        return redirect(route('pangkat_index'))->with('ubah', 'Data Pangkat '.$request->pangkat.' Berhasil di ubah');
    }

    public function pangkat_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $Pangkat=Pangkat::findOrFail($id);
        $Pangkat->delete();

        return redirect(route('pangkat_index'))->with('hapus', 'Data pangkat Berhasil di hapus');
    }//fungsi menghapus data pangkat

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

    //kegiatan
    public function kegiatan_index(){
        $Kegiatan = Kegiatan::all();
        return view('admin.kegiatan_data',compact('Kegiatan'));
    }

    public function kegiatan_tambah(Request $request){

        $this->validate(request(),[
            'kode_kegiatan'=>'required|unique:kegiatans',
            'kegiatan'=>'required|unique:kegiatans',
        ]);

        $Kegiatan = new Kegiatan;

        $Kegiatan->kode_kegiatan  = $request->kode_kegiatan;
        $Kegiatan->kegiatan       = $request->kegiatan;
        $Kegiatan->save();

        return redirect(route('kegiatan_index'))->with('sukses', 'Data kegiatan '.$request->kegiatan.' Berhasil di Tambahkan');
    }//fungsi menambahkan data kegiatan

    public function kegiatan_edit($id){
        $id = IDCrypt::Decrypt($id);
        $Kegiatan = Kegiatan::findOrFail($id);
        return view('admin.kegiatan_edit',['Kegiatan' => $Kegiatan]);
    }

    public function kegiatan_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $Kegiatan = Kegiatan::findOrFail($id);

         $this->validate(request(),[
            'kode_kegiatan'=>'required',
            'kegiatan'=>'required'
        ]);

        $Kegiatan->kode_kegiatan = $request->kode_kegiatan;
        $Kegiatan->kegiatan = $request->kegiatan;
        $Kegiatan->update();
        return redirect(route('kegiatan_index'))->with('ubah', 'Data Kegiatan '.$request->kegiatan.' Berhasil di ubah');
    }

    public function kegiatan_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $Kegiatan=Kegiatan::findOrFail($id);
        $Kegiatan->delete();

        return redirect(route('kegiatan_index'))->with('hapus', 'Data kegiatan Berhasil di hapus');
    }//fungsi menghapus data kegiatan

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

        $Kabupaten->provinsi_id= $request->provinsi_id;
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

        $Kabupaten->provinsi_id= $request->provinsi_id;
        $Kabupaten->kode_kabupaten= $request->kode_kabupaten;
        $Kabupaten->kabupaten= $request->kabupaten;
        $Kabupaten->update();
       return redirect(route('kabupaten_index'))->with('success', 'Data Kabupaten '.$request->kabupaten.' Berhasil di Ubah');
      }//mengubah data kabupaten

       public function kabupaten_hapus($id){
        $id = IDCrypt::Decrypt($id);
            $Kabupaten=Kabupaten::findOrFail($id);
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
          'kecamatan'=>'required|unique:kecamatans',
          'kabupaten_id'=>'required'
        ]);

        $kecamatan = new kecamatan;
        $kecamatan->kabupaten_id= $request->kabupaten_id;
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
           'kode_kecamatan'=>'required|unique:kecamatans',
           'kecamatan'=>'required|unique:kecamatans',
           'kabupaten_id'=>'required'
       ]);
       $Kecamatan->kabupaten_id= $request->kabupaten_id;
       $Kecamatan->kode_kecamatan= $request->kode_kecamatan;
       $Kecamatan->kecamatan= $request->kecamatan;
    //    dd($Kecamatan);
       $Kecamatan->update();
       return redirect(route('kecamatan_index'))->with('ubah', 'Data kecamatan '.$request->kecamatan.' Berhasil di Ubah');
      }//mengubah data kecamatan

      public function kecamatan_hapus($id){
        $id = IDCrypt::Decrypt($id);
            $Kecamatan=kecamatan::findOrFail($id);
            $Kecamatan->delete();
            return redirect(route('kecamatan_index'))->with('hapus', 'Data  Berhasil di Hapus');

    }  //menghapus data  kecamatan


     //kelurahan

     public function kelurahan_index(){
        $Kelurahan = Kelurahan::all();
        $Kecamatan = Kecamatan::all();

        return view('admin.kelurahan_data',compact('Kelurahan','Kecamatan'));
    }//menampilkan data kelurahan


    public function kelurahan_tambah(Request $request){

        $this->validate(request(),[
          'kode_kelurahan'=>'required|unique:kelurahans',
          'kelurahan'=>'required|unique:kelurahans',
          'kecamatan_id'=>'required'

        ]);

        $Kelurahan = new Kelurahan;
        $Kelurahan->kode_kelurahan= $request->kode_kelurahan;
        $Kelurahan->kelurahan= $request->kelurahan;
        $Kelurahan->kecamatan_id= $request->kecamatan_id;

        $Kelurahan->save();

          return redirect(route('kelurahan_index'))->with('sukses', 'Data kelurahan '.$request->kelurahan.' Berhasil di Tambahkan');
      }//menambah data kelurahan

      public function kelurahan_edit($id){
        $id = IDCrypt::Decrypt($id);
        $Kelurahan = Kelurahan::findOrFail($id);
        $Kecamatan = Kecamatan::All();

        return view('admin.kelurahan_edit',compact('Kelurahan','Kecamatan'));
       }//menampikan halaman edit kelurahan

       public function kelurahan_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $Kelurahan = Kelurahan::findOrFail($id);

        $this->validate(request(),[
           'kode_kelurahan'=>'required|unique:kelurahans',
           'kelurahan'=>'required|unique:kelurahans',
           'kecamatan_id'=>'required'
       ]);
       $Kelurahan->kecamatan_id= $request->kecamatan_id;
       $Kelurahan->kode_kelurahan= $request->kode_kelurahan;
       $Kelurahan->kelurahan= $request->kelurahan;
       $Kelurahan->update();
       return redirect(route('kelurahan_index'))->with('ubah', 'Data kelurahan '.$request->kelurahan.' Berhasil di Ubah');
      }//mengubah data kelurahan


       public function kelurahan_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $kelurahan=kelurahan::findOrFail($id);
        $kelurahan->delete();
        return redirect(route('kelurahan_index'))->with('hapus', 'Data Berhasil di Hapus');
    } //menghapus data kelurahan

    //tempat tujuan
    public function tujuan_index(){
        $Tujuan = Tujuan::all();
        $Provinsi = Provinsi::all();
        // $Provinsis = Provinsi::all()->pluck('provinsi', 'id')->prepend(trans('global.pleaseSelect'), '');
        // $Kabupaten = Kabupaten::all();
        // $Kecamatan = Kecamatan::all();
        // $Kelurahan = Kelurahan::all();

        return view('admin.tujuan_data',compact('Tujuan','Provinsi'));
        // return view('admin.tujuan_data',compact('Tujuan','Provinsi','Kabupaten','Kecamatan','Kelurahan'));
    }//menampilkan data tujuan

//     public function getKabupatenList(Request $request){

//     if (!$request->provinsi_id) {
//         $html = '<option value="">'.trans('global.pleaseSelect').'</option>';
//     } else {
//         $html = '';
//         $kabupatens = Kabupaten::where('provinsi_id', $request->provinsi_id)->get();
//         foreach ($kabupatens as $k) {
//             $html .= '<option value="'.$k->id.'">'.$k->kabupaten.'</option>';
//         }
//     }

//     return response()->json(['html' => $html]);
// }

    public function getKabupatenList(Request $request){
        $Kabupaten = Kabupaten::all()
            ->where("provinsi_id",$request->provinsi_id)
            ->pluck("kabupaten","id");
            return response()->json($Kabupaten);
    }//get kabupaten list

    public function getKecamatanList(Request $request){
        $Kecamatan = Kecamatan::all()
            ->where("kabupaten_id",$request->kabupaten_id)
            ->pluck("kecamatan","id");
            return response()->json($Kecamatan);
    }//get kabupaten list

    public function getKelurahanList(Request $request){
        $Kelurahan = Kelurahan::all()
            ->where("kecamatan_id",$request->kecamatan_id)
            ->pluck("kelurahan","id");
            return response()->json($Kelurahan);
    }//get kabupaten list


    public function tujuan_tambah(Request $request){

        $this->validate(request(),[
          'kode_tujuan'=>'required|unique:tujuans',
          'tujuan'=>'required|unique:tujuans',
          'provinsi_id'=>'required',
          'kabupaten_id'=>'required',
          'kecamatan_id'=>'required',
          'kelurahan_id'=>'required'

        ]);

        $Tujuan = new Tujuan;
        $Tujuan->kode_tujuan= $request->kode_tujuan;
        $Tujuan->tujuan= $request->tujuan;
        $Tujuan->provinsi_id= $request->provinsi_id;
        $Tujuan->kabupaten_id= $request->kabupaten_id;
        $Tujuan->kecamatan_id= $request->kecamatan_id;
        $Tujuan->kelurahan_id= $request->kelurahan_id;

        $Tujuan->save();

          return redirect(route('tujuan_index'))->with('sukses', 'Data tujuan '.$request->tujuan.' Berhasil di Tambahkan');
      }//menambah data tujuan

      public function tujuan_edit($id){
        $id = IDCrypt::Decrypt($id);
        $Tujuan = Tujuan::findOrFail($id);
        $Provinsi = Provinsi::all();
        $Kabupaten = Kabupaten::all();
        $Kecamatan = Kecamatan::all();
        $Kelurahan = Kelurahan::all();

        return view('admin.tujuan_edit',compact('Tujuan','Provinsi','Kabupaten','Kecamatan','Kelurahan'));
       }//menampikan halaman edit tujuan

       public function tujuan_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $Tujuan = Tujuan::findOrFail($id);

        $this->validate(request(),[
           'kode_tujuan'=>'required',
           'tujuan'=>'required',
           'provinsi_id'=>'required',
           'kabupaten_id'=>'required',
           'kecamatan_id'=>'required',
           'kelurahan_id'=>'required'
       ]);
       $Tujuan->provinsi_id= $request->provinsi_id;
       $Tujuan->kabupaten_id= $request->kabupaten_id;
       $Tujuan->kecamatan_id= $request->kecamatan_id;
       $Tujuan->kelurahan_id= $request->kelurahan_id;
       $Tujuan->kode_tujuan= $request->kode_tujuan;
       $Tujuan->tujuan= $request->tujuan;
       $Tujuan->update();
       return redirect(route('tujuan_index'))->with('ubah', 'Data tujuan '.$request->tujuan.' Berhasil di Ubah');
      }//mengubah data tujuan


       public function tujuan_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $tujuan=tujuan::findOrFail($id);
        $tujuan->delete();
        return redirect(route('tujuan_index'))->with('hapus', 'Data Berhasil di Hapus');
    } //menghapus data tujuan

    //jenis transportasi
    public function transportasi_index(){
        $Transportasi = Transportasi::all();

        return view('admin.transportasi_data',compact('Transportasi'));
    }//menampilkan data transportasi


    public function transportasi_tambah(Request $request){

        $this->validate(request(),[
          'kode_transportasi'=>'required',
          'transportasi'=>'required'

        ]);

        $Transportasi = new Transportasi;
        $Transportasi->kode_transportasi= $request->kode_transportasi;
        $Transportasi->transportasi= $request->transportasi;

        $Transportasi->save();

          return redirect(route('transportasi_index'))->with('sukses', 'Data transportasi '.$request->transportasi.' Berhasil di Tambahkan');
      }//menambah data transportasi

      public function transportasi_edit($id){
        $id = IDCrypt::Decrypt($id);
        $Transportasi = Transportasi::findOrFail($id);

        return view('admin.transportasi_edit',compact('Transportasi'));
       }//menampikan halaman edit transportasi

       public function transportasi_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $Transportasi = Transportasi::findOrFail($id);

        $this->validate(request(),[
            'kode_transportasi'=>'required',
            'transportasi'=>'required'
       ]);
       $Transportasi->kode_transportasi= $request->kode_transportasi;
       $Transportasi->transportasi= $request->transportasi;
       $Transportasi->update();
       return redirect(route('transportasi_index'))->with('ubah', 'Data transportasi '.$request->transportasi.' Berhasil di Ubah');
      }//mengubah data transportasi


       public function transportasi_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $transportasi=transportasi::findOrFail($id);
        $transportasi->delete();
        return redirect(route('transportasi_index'))->with('hapus', 'Data Berhasil di Hapus');
    } //menghapus data transportasi

    //jenis pejabat
    public function pejabat_index(){
        $Pejabat = Pejabat::all();

        return view('admin.pejabat_data',compact('Pejabat'));
    }//menampilkan data pejabat


    public function pejabat_tambah(Request $request){

        $this->validate(request(),[
          'kode_pejabat'=>'required|unique:pejabats',
          'nip'=>'required',
          'nama'=>'required',
          'jabatan'=>'required'

        ]);

        $Pejabat = new Pejabat;
        $Pejabat->kode_pejabat= $request->kode_pejabat;
        $Pejabat->nip= $request->nip;
        $Pejabat->nama= $request->nama;
        $Pejabat->jabatan= $request->jabatan;

        $Pejabat->save();

          return redirect(route('pejabat_index'))->with('sukses', 'Data pejabat '.$request->pejabat.' Berhasil di Tambahkan');
      }//menambah data pejabat

      public function pejabat_edit($id){
        $id = IDCrypt::Decrypt($id);
        $Pejabat = Pejabat::findOrFail($id);

        return view('admin.pejabat_edit',compact('Pejabat'));
       }//menampikan halaman edit pejabat

       public function pejabat_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $Pejabat = Pejabat::findOrFail($id);

        $this->validate(request(),[
           'kode_pejabat'=>'required',
           'nip'=>'required',
           'nama'=>'required',
           'jabatan'=>'required'
       ]);
       $Pejabat->kode_pejabat= $request->kode_pejabat;
       $Pejabat->nip= $request->nip;
       $Pejabat->nama= $request->nama;
       $Pejabat->jabatan= $request->jabatan;
       $Pejabat->update();
       return redirect(route('pejabat_index'))->with('ubah', 'Data pejabat '.$request->pejabat.' Berhasil di Ubah');
      }//mengubah data pejabat


       public function pejabat_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $pejabat=pejabat::findOrFail($id);
        $pejabat->delete();
        return redirect(route('pejabat_index'))->with('hapus', 'Data Berhasil di Hapus');
    } //menghapus data pejabat

    //sppd
    public function sppd_index(){

        $Sppd = Sppd::all();
        // $Pangkat = Pangkat::all();
        // $Jabatan = Jabatan::all();
        $Karyawan = Karyawan::all();
        $Anggaran = Anggaran::all();
        $Kegiatan = Kegiatan::all();
        // $Provinsi = Provinsi::all();
        // $Kabupaten = Kabupaten::all();
        // $Kecamatan = Kecamatan::all();
        // $Kelurahan = Kelurahan::all();
        $Tujuan = Tujuan::all();
        $Transportasi = Transportasi::all();
        $Pejabat = Pejabat::all();


        return view('admin.sppd_data',compact('Sppd'));
        // return view('admin.sppd_data',compact('Sppd','Pangkat','Jabatan','Karyawan','Anggaran','Kegiatan','Provinsi','Kabupaten','Kecamatan','Kelurahan','Tujuan','Transportasi','Pejabat'));
    }//menampilkan data sppd

    public function sppd_tambah(){
        $Karyawan = Karyawan::all();
        $Anggaran = Anggaran::all();
        $Kegiatan = Kegiatan::all();
        $Tujuan = Tujuan::all();
        $Transportasi = Transportasi::all();
        $Pejabat = Pejabat::all();

        //dd($karyawan);
        return view('admin.sppd_tambah',compact('Karyawan','Anggaran','Kegiatan','Tujuan','Transportasi','Pejabat'));
        // return view('admin.sppd_data',compact('Sppd','Pangkat','Jabatan','Karyawan','Anggaran','Kegiatan','Provinsi','Kabupaten','Kecamatan','Kelurahan','Tujuan','Transportasi','Pejabat'));
    }//menampilkan data sppd

    public function sppd_store( Request $request ){

        $this->validate(request(),[
          'kode_sppd'=>'required|unique:sppds',
          'karyawan_id'=>'required',
          'anggaran_id'=>'required',
          'tujuan_id'=>'required',
          'transportasi_id'=>'required',
          'pejabat_id'=>'required',
          'tgl_berangkat'=>'required',
          'tgl_kembali'=>'required',
          'keterangan'=>'required',

        ]);


        $Sppd = new Sppd;
        $Sppd->kode_sppd= $request->kode_sppd;
        $Sppd->karyawan_id= $request->karyawan_id;
        $Sppd->anggaran_id= $request->anggaran_id;
        $Sppd->kegiatan_id= $request->kegiatan_id;
        $Sppd->tujuan_id= $request->tujuan_id;
        $Sppd->transportasi_id= $request->transportasi_id;
        $Sppd->pejabat_id= $request->pejabat_id;
        $Sppd->tgl_berangkat= $request->tgl_berangkat;
        $Sppd->tgl_kembali= $request->tgl_kembali;
        $Sppd->keterangan= $request->keterangan;

        $Sppd->save();

          return redirect(route('sppd_index'))->with('sukses', 'Data sppd '.$request->kode_sppd.' Berhasil di Tambahkan');
      }//menambah data sppd

      public function sppd_edit($id){
        $id = IDCrypt::Decrypt($id);

        $Sppd = Sppd::findOrFail($id);
        $Kecamatan = Kecamatan::all();


        return view('admin.sppd_edit',compact('Sppd','Kecamatan'));
       }//menampikan halaman edit sppd

       public function sppd_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);

        $Sppd = Sppd::findOrFail($id);

        $this->validate(request(),[
           'kode_sppd'=>'required|unique:sppds',
           'sppd'=>'required|unique:sppds',
           'kecamatan_id'=>'required'
       ]);
       $Sppd->kecamatan_id= $request->kecamatan_id;
       $Sppd->kode_sppd= $request->kode_sppd;
       $Sppd->sppd= $request->sppd;
       $Sppd->update();
       return redirect(route('sppd_index'))->with('ubah', 'Data sppd '.$request->sppd.' Berhasil di Ubah');
      }//mengubah data sppd

       public function sppd_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $sppd=sppd::findOrFail($id);
        $sppd->delete();
        return redirect(route('sppd_index'))->with('hapus', 'Data Berhasil di Hapus');
    } //menghapus data sppd

    public function sppd_cetak(){


        return view('laporan.sppd');
       }//mencetak  sppd

}
