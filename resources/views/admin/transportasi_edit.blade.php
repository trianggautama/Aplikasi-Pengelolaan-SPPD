@extends('layouts.admin')

@section('content')
<div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-lg-10 ">


            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Data Transportasi</h6>
              </div>
              <div class="card-body">
                <div class="col-md">
                  <form class="form-horizontal"  method="post" action="">
                    {{method_field('PUT') }}
                    {{ csrf_field() }}
                  <div class="form-group">
                    <div class="col-sm-12">
                    <input type="text" name="kode_transportasi" class="form-control" id="inputName" value="{{$Transportasi->kode_transportasi}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                    <input type="text" name="transportasi" class="form-control" id="inputName" value="{{$Transportasi->transportasi}}">
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
