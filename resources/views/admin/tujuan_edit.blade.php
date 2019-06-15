@extends('layouts.admin')

@section('content')
<div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-lg-10 ">


            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Data Tujuan</h6>
              </div>
              <div class="card-body">
                <div class="col-md">
                    <form class="form-horizontal"  method="post" action="">
                            {{method_field('PUT') }}
                            {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-md">
                                        <input id="kode_tujuan" type="text" class="form-control" name="kode_tujuan" value="{{ $Tujuan->kode_tujuan}}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md">
                                        <input id="tujuan" type="text" class="form-control" name="tujuan" value="{{ $Tujuan->tujuan}}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <p>Provinsi</p>
                                        <select class="form-control" name="provinsi_id">
                                            @foreach ($Provinsi as $j)
                                            <option value="{{ $j->id}}" {{ $Tujuan->provinsi_id == $j->id ? 'selected' : ''}}>{{$j->provinsi}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                        <p>Kabupaten</p>
                                        <select class="form-control" name="kabupaten_id">
                                            @foreach ($Kabupaten as $j)
                                            <option value="{{ $j->id}}" {{ $Tujuan->kabupaten_id == $j->id ? 'selected' : ''}}>{{$j->kabupaten}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <p>Kecamatan</p>
                                    <select class="form-control" name="kecamatan_id">
                                        @foreach ($Kecamatan as $j)
                                        <option value="{{ $j->id}}" {{ $Tujuan->kecamatan_id == $j->id ? 'selected' : ''}}>{{$j->kecamatan}}</option>
                                        @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group">
                                        <p>Kelurahan</p>
                                        <select class="form-control" name="kelurahan_id">
                                            @foreach ($Kelurahan as $j)
                                            <option value="{{ $j->id}}" {{ $Tujuan->kelurahan_id == $j->id ? 'selected' : ''}}>{{$j->kelurahan}}</option>
                                            @endforeach
                                        </select>
                                     </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md text-right">
                                        <button type="submit" class="btn  btn-primary">
                                           Ubah Data
                                        </button>
                                        {{csrf_field() }}
                                    </div>
                                </div>
                            </form>
                </div>
                <div class="col-md">

                </div>
            </div>
            </div>

          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection
