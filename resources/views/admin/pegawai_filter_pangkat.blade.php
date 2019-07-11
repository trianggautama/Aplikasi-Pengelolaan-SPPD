@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10 ">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Filter Cetak Pegawai</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <p>Pangkat/Golongan</p>
                            <select class="form-control" name="pangkat_id">
                                @foreach($pangkat as $j)
                                <option value="{{$j->id}}">{{ $j->pangkat}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="text-right">
                                <a href="{{Route('pegawai_index')}}" class="btn btn-danger">Batal</a>
                                <input class="btn btn-primary" type="submit" name="submit" value="Cetak Data">
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
