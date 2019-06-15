@extends('layouts.admin')

@section('title', __('outlet.list'))

@section('content')
<div class="mb-3">
        <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                <div class="text-right">
                        <a href="##tambahdata" data-toggle="modal"data-target="#tambahdata" class="btn btn-sm btn-success" style="margin-bottom:15px;"> + Tambah Data  </a>
                        <a href=""  class="btn btn-sm btn-primary" style="margin-bottom:15px;"><i class="fas fa-print"></i> Cetak Data  </a>
                    </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Jabatan</h6>
                  </div>
                  <div class="card-body">
                        @include('layouts.alert_sukses')
                        @include('layouts.alert_ubah')
                        @include('layouts.alert_hapus')
                        @include('layouts.errors')
                    <div class="table-responsive">
                      <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Kode Pangkat</th>
                            <th>Nama Pangkat</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>No</th>
                            <th>Kode Pangkat</th>
                            <th>Nama Pangkat</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            @foreach($Pangkat as $j)
                                <tr>
                                    @php
                                    $no=1;
                                    @endphp
                                <td>{{ $no++ }}</td>
                                <td>{{ $j->kode_pangkat }}</td>
                                <td>{{ $j->pangkat }}</td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-sm btn-primary " >Info</a>
                                    <a href="{{route('pangkat_edit', ['id' => IDCrypt::Encrypt( $j->id)])}}" class="btn btn-sm btn-info " >Edit</a>
                                        <a href="{{route('pangkat_hapus', ['id' => IDCrypt::Encrypt( $j->id)])}}" class="btn btn-sm btn-danger" >Hapus</a>

                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
<div id="tambahdata" class="modal fade" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        <div class="modal-header">
          <h4>Tambah Data</h4>
          <button type="button" class="close " data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <!-- form login -->
          <form  method="post" action="">

            <div class="form-group">
              <input type="text" name="kode_pangkat"  class="form-control" placeholder="Kode Pangkat"/>
            </div>
            <div class="form-group">
                <input type="text" name="pangkat"  class="form-control" placeholder="Nama Pangkat"/>
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
          <!-- /.box -->
        </div>

@endsection
