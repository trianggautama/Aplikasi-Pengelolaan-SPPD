@extends('layouts.admin')

@section('title', __('outlet.list'))

@section('content')
<div class="mb-3">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <a href="{{Route('sppd_tambah')}}" class="btn btn-sm btn-success" style="margin-bottom:15px;">Tambah Data </a>
        <a href="{{route('laporan-sppd-keseluruhan')}}" class="btn btn-sm btn-primary" style="margin-bottom:15px;"><i class="fas fa-print"></i> Cetak Data
            Keseluruhan </a>
        <a href="{{Route('sppd_filter_lokasi')}}"  class="btn btn-sm btn-primary"
            style="margin-bottom:15px;"><i class="fas fa-print"></i> Cetak Data Berdasarkan Tujuan </a>
        <a href="{{Route('sppd_filter_waktu')}}" class="btn btn-sm btn-primary"
            style="margin-bottom:15px;"><i class="fas fa-print"></i> Cetak Data
            Berdasarkan waktu </a>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Sppd</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Sppd</th>
                                <th>Nama Karyawan</th>
                                <th>Anggaran</th>
                                <th>Tujuan</th>
                                <th>Kegiatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Sppd</th>
                                <th>Nama Karyawan</th>
                                <th>Anggaran</th>
                                <th>Tujuan</th>
                                <th>Kegiatan</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($Sppd as $p)
                            <tr>
                                @php
                                $no=1;
                                @endphp
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->kode_sppd }}</td>
                                <td>{{ $p->karyawan->nama }}</td>
                                <td>{{ $p->anggaran->pembebanan }}</td>
                                <td>{{ $p->tujuan->tujuan }}</td>
                                <td>{{ $p->kegiatan->kegiatan }}</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-sm btn-primary ">Info</a>
                                    <a href="{{route('sppd_edit', ['id' => IDCrypt::Encrypt( $p->id)])}}"
                                        class="btn btn-sm btn-info ">Edit</a>
                                    <a href="{{route('sppd_hapus', ['id' => IDCrypt::Encrypt( $p->id)])}}"
                                        class="btn btn-sm btn-danger">Hapus</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
            @endsection
