@extends('layouts.admin')

@section('content')
<div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-lg-10 ">


            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Data Jabatan</h6>
              </div>
              <div class="card-body">
                <div class="col-md">
                  <form class="form-horizontal"  method="post" action="">
                    {{method_field('PUT') }}
                    {{ csrf_field() }}
                  <div class="form-group">
                    <div class="col-sm-12">
                    <input type="text" name="kode_jabatan" class="form-control" id="inputName" value="{{$Jabatan->kode_jabatan}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                    <input type="text" name="jabatan" class="form-control" id="inputName" value="{{$Jabatan->jabatan}}">
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-warning " style="margin-left:3px;">Ubah</button>
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
