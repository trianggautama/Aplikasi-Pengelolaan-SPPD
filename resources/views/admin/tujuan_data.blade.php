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
                    <h6 class="m-0 font-weight-bold text-primary">Data Tempat/Tujuan</h6>
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
                            <th>Kode Tujuan</th>
                            <th>Tempat/Tujuan</th>
                            <th>Provinsi</th>
                            <th>Kabupaten</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>No</th>
                            <th>Kode Tujuan</th>
                            <th>Tempat/Tujuan</th>
                            <th>Provinsi</th>
                            <th>Kabupaten</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        @foreach($Tujuan as $p)
                                <tr>
                                    @php
                                    $no=1;
                                    @endphp
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->kode_tujuan }}</td>
                                <td>{{ $p->tujuan }}</td>
                                <td>{{ $p->provinsi->provinsi }}</td>
                                <td>{{ $p->kabupaten->kabupaten }}</td>
                                <td>{{ $p->kecamatan->kecamatan }}</td>
                                <td>{{ $p->kelurahan->kelurahan }}</td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-sm btn-primary " >Info</a>
                                    <a href="{{route('tujuan_edit', ['id' => IDCrypt::Encrypt( $p->id)])}}" class="btn btn-sm btn-info " >Edit</a>
                                        <a href="{{route('tujuan_hapus', ['id' => IDCrypt::Encrypt( $p->id)])}}" class="btn btn-sm btn-danger" >Hapus</a>
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
              <input type="text" name="kode_tujuan"  class="form-control" placeholder="Kode Tujuan"/>
            </div>
            <div class="form-group">
                <input type="text" name="tujuan"  class="form-control" placeholder="Tempat/Tujuan"/>
            </div>
            {{-- <div class="form-group">
                <p>Provinsi</p>
                <select class="form-control" name="provinsi_id" id="provinsi">
                  <option value="" selected disabled>Pilih Provinsi</option>
                  @foreach($Provinsis as $id => $provinsi)
                <option value="{{ $id }}">
                    {{ $provinsi }}
                </option>
                @endforeach
                </select>
             </div> --}}
            <div class="form-group">
                <p>Provinsi</p>
                <select class="form-control" name="provinsi_id" id="provinsi">
                  <option value="" selected disabled>Pilih Provinsi</option>
                  @foreach($Provinsi as $j)
                  <option value="{{$j->id}}" >{{ $j->provinsi}}</option>
                  @endforeach
                </select>
             </div>
             <div class="form-group">
              <p>Kabupaten</p>
              <select class="form-control" name="kabupaten_id" id="kabupaten">
                  {{-- <option value="">{{ trans('global.pleaseSelect') }}</option> --}}
              </select>
              @if($errors->has('kabupaten_id'))
              <p class="help-block">
                {{ $errors->first('kabupaten_id') }}
              </p>
              @endif
           </div>
           <div class="form-group">
                <p>Kecamatan</p>
                <select class="form-control" name="kecamatan_id" id="kecamatan">
                </select>
                @if($errors->has('kecamatan_id'))
                <p class="help-block">
                {{ $errors->first('kecamatan_id') }}
                </p>
                @endif
             </div>
             <div class="form-group">
                <p>Kelurahan</p>
                <select class="form-control" name="kelurahan_id" id="kelurahan">
                </select>
                @if($errors->has('kelurahan_id'))
                <p class="help-block">
                {{ $errors->first('kelurahan_id') }}
                </p>
                @endif
             </div>
            <div class="form-group">
             <div class="text-right">
               <input class="btn btn-primary" type="submit" name="submit" value="Submit">
               {{csrf_field() }}
             </div>
           </div>

          </form>
          <!-- end form login -->
        </div>
          </div>
          <!-- /.box -->
        </div>

{{-- <script type="text/javascript">
        $("#provinsi").change(function(){
            $.ajax({
                url: "{{ url('get-abupaten-list') }}?provinsi_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#kabupaten').html(data.html);
                }
            });
        });
</script>         --}}

<script type="text/javascript">
    $('#provinsi').change(function(){
    var provinsiID = $(this).val();
    if(provinsiID){
        $.ajax({
           type:"GET",
           url:"{{url('get-kabupaten-list')}}?provinsi_id="+provinsiID,
           success:function(res){
            if(res){
                $("#kabupaten").empty();
                $("#kabupaten").append('<option>Pilih Kabupaten</option>');
                $.each(res,function(key,value){
                    $("#kabupaten").append('<option value="'+key+'">'+value+'</option>');
                });

            }else{
               $("#kabupaten").empty();
            }
           }
        });
    }else{
        $("#kabupaten").empty();
        $("#kecamatan").empty();
        $("#kelurahan").empty();
    }
   });
    $('#kabupaten').on('change',function(){
    var kabupatenID = $(this).val();
    if(kabupatenID){
        $.ajax({
           type:"GET",
           url:"{{url('get-kecamatan-list')}}?kabupaten_id="+kabupatenID,
           success:function(res){
            if(res){
                $("#kecamatan").empty();
                $("#kecamatan").append('<option>Pilih Kecamatan</option>');
                $.each(res,function(key,value){
                    $("#kecamatan").append('<option value="'+key+'">'+value+'</option>');
                });

            }else{
               $("#kecamatan").empty();
            }
           }
        });
    }else{
        $("#kecamatan").empty();
        $("#kelurahan").empty();
    }

   });
   $('#kecamatan').on('change',function(){
    var kecamatanID = $(this).val();
    if(kecamatanID){
        $.ajax({
           type:"GET",
           url:"{{url('get-kelurahan-list')}}?kecamatan_id="+kecamatanID,
           success:function(res){
            if(res){
                $("#kelurahan").empty();
                $("#kelurahan").append('<option>Pilih Kelurahan</option>');
                $.each(res,function(key,value){
                    $("#kelurahan").append('<option value="'+key+'">'+value+'</option>');
                });

            }else{
               $("#kelurahan").empty();
            }
           }
        });
    }else{
        $("#kelurahan").empty();
    }

   });
</script>         --}}

@endsection
