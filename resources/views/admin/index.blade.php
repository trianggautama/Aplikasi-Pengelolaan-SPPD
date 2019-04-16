@extends('layouts.admin')

@section('content')
<div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Beranda </h1>
        </div>

        <div class="row">

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Pegawai </div>
                    <div><a  class="h5 mb-0 font-weight-bold text-gray-800" href=""> 48 Pegawai</a></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Lokasi</div>
                    <div ><a  class="h5 mb-0 font-weight-bold text-gray-800" href=""> 108 Lokasi</a></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-marker fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Riwayat SPPD</div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div ><a  class="h5 mb-0 font-weight-bold text-gray-800" href="">211 SPPD</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Pending Requests Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Admin</div>
                    <div ><a  class="h5 mb-0 font-weight-bold text-gray-800" href=""> 3 Admin</a></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-lg-12">


            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang !!</h6>
              </div>
              <div class="card-body">
                Selamat datang admin di halaman admin aplikasi pengelolaan langsung lokasi parkir Dinas Perhubungan Kota Banjarbaru
              </div>
            </div>

          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection
