@extends('layouts.admin')

@section('content')
<div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-lg-10 ">


            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah  Data Pegawai</h6>
              </div>
              <div class="card-body">
                <div class="col-md">
                    <form class="form-horizontal"  method="post" action="">
                            {{method_field('PUT') }}
                            {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-md">
                                        <input id="nip" type="text" class="form-control" name="nip" value="{{$Karyawan->nip}}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md">
                                        <input id="nama" type="text" class="form-control" name="nama" value="{{$Karyawan->nama}}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>Jabatan</p>
                                    <select class="form-control" name="id_jabatan">
                                        @foreach ($Jabatan as $j)
                                        <option value="{{ $j->id}}" {{$Karyawan->id_jabatan == $j->id ? 'selected' : ''}}>{{$j->jabatan}}</option>
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
