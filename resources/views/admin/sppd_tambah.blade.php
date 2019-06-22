@extends('layouts.admin')

@section('content')
<div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-lg-10 ">


            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah SPPD</h6>
              </div>
              <div class="card-body">
              <form  method="post" action="">

<div class="form-group">
  <input type="text" name="kode_sppd"  class="form-control" placeholder="Kode Sppd"/>
</div>
<div class="form-group">
    <p>Nama Karyawan</p>
    <select class="form-control" name="karyawan_id">
      @foreach($Karyawan as $j)
      <option value="{{$j->id}}">{{ $j->nama}}</option>
      @endforeach
    </select>
 </div>
 <div class="form-group">
    <p>Beban Anggaran</p>
    <select class="form-control" name="anggaran_id">
      @foreach($Anggaran as $j)
      <option value="{{$j->id}}">{{ $j->pembebanan}} - {{ $j->akun }}</option>
      @endforeach
    </select>
 </div>
 <div class="form-group">
    <p>Kegiatan</p>
    <select class="form-control" name="kegiatan_id">
      @foreach($Kegiatan as $j)
      <option value="{{$j->id}}">{{ $j->kegiatan}}</option>
      @endforeach
    </select>
 </div>
 <div class="form-group">
    <p>tanggal Berangkat</p>
    <input type="date" class="form-control" name="tanggal_berangkat">
 </div>
 <div class="form-group">
    <p>tanggal Kembali</p>
    <input type="date" class="form-control" name="tanggal_kembali">
 </div>
 <div class="form-group">
    <p>Tujuan</p>
    <select class="form-control" name="tujuan_id">
      @foreach($Tujuan as $j)
      <option value="{{$j->id}}">{{ $j->tujuan}}</option>
      @endforeach
    </select>
 </div>
<div class="form-group">
    <p>Jenis Transportasi</p>
    <select class="form-control" name="transportasi_id">
      @foreach($Transportasi as $j)
      <option value="{{$j->id}}">{{ $j->transportasi}}</option>
      @endforeach
    </select>
 </div>
 <div class="form-group">
    <p>Pejabat Struktural</p>
    <select class="form-control" name="pejabat_id">
      @foreach($Pejabat as $j)
      <option value="{{$j->id}}">{{ $j->nama}}</option>
      @endforeach
    </select>
 </div>
<div class="form-group">
 <div class="text-right">
   <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
   {{csrf_field() }}
 </div>
</div>

</form>
<!-- end form login -->
                
            </div>
            </div>

          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection
