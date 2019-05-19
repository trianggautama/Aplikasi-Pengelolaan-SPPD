@extends('layouts.admin')

@section('content')
<div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-lg-10 ">


            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Data Kabupaten</h6>
              </div>
              <div class="card-body">
                <div class="col-md">
                    <form class="form-horizontal"  method="post" action="">
                            {{method_field('PUT') }}
                            {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-md">
                                        <input id="kode_kabupaten" type="text" class="form-control" name="kode_kabupaten" value="{{ $Kabupaten->kode_kabupaten}}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md">
                                        <input id="kabupaten" type="text" class="form-control" name="kabupaten" value="{{ $Kabupaten->kabupaten}}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>Provinsi</p>
                                    <select class="form-control" name="id_provinsi">
                                        @foreach ($Provinsi as $j)
                                        <option value="{{ $j->id}}" {{ $Kabupaten->id_provinsi == $j->id ? 'selected' : ''}}>{{$j->provinsi}}</option>
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
