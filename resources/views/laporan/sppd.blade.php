<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan SPPD</title>
</head>
<body>
    <style>
    body{
        margin:20px;
    }
      .judul{
         text-align: center;
     }
     .header{
         margin-bottom: 0px;
         text-align: center;
         height: 150px;
         padding: 0px;
     }
     .pemko{
         width:80px;
     }
     .logo{
         float: left;
         margin-right: 0px;
         width: 15%;
         padding:0px;
         text-align: right;
     }
     .headtext{
         float:right;
         margin-left: 0px;
         width: 70%;
         padding-left:0px;
         padding-right:10%;
     }
     hr{
         margin-top: 10%;
         height: 3px;
         background-color: black;
         width:100%;
     }

        .nomor-surat{
            width:100%;
            text-align:right;

        }
        .title{
            width: 100%;
            text-align: center;
            padding:0px !important;
            margin:0px !important;

        }
        .table{
            float: right;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table,
        th,
        td {
            border: 1px solid #708090;
            width: fixed;
        }

        .ttd{
         margin-left:60%;
         text-align: center;
     }
        .header2{
            margin-left:60%;
         text-align: center;
            padding-left:30px;
        }
    </style>
        <div class="header">
            <div class="logo">
                    <img  class="pemko" src="images/logo-kabupaten.jpg"  >
            </div>
            <div class="headtext">
                <h3 style="margin:0px;">PEMERINTAH KABUPATEN TAPIN</h3>
                <h1 style="margin:0px;">KALIMANTAN SELATAN</h1>
                <p style="margin:0px;">Alamat : Jl.Brigjend H.Hasan Baseri Km. 2  (0517) 31040 Fax. 31046 Rantau</p>
            </div>
            <br>
            <hr>
    </div>
    <section class="nomor-surat">
        <p>Nomor : 090 /   &nbsp;  &nbsp;  / PD-{{ $tahun }}</p>
    </section>
    <section class="title">
        <h1 style="margin:0px; margin-bottom:5px !important;">SURAT PERINTAH PERJALANAN DINAS</h1>
     </section>

     <section>
        <table style="margin-bottom:20px; ">
            <tr>
                <td style="padding-left:5px;">
                    <p>01.Pejabat berwenang yang memberi perintah</p>
                </td>
                <td >
                   &nbsp; Kepala Dinas Pendidikan Kabupaten Tapin
                </td>
            </tr>
            <tr>
                <td style="padding-left:5px;">
                    <p>02.Nama Pegawai yang di perintahkan</p>
                </td>
                <td >
                   &nbsp; {{ $sppd->karyawan->nama }}
                </td>
            </tr>
            <tr>
                <td style="padding-left:5px;">
                   <p style="margin:0px">03. a. Pangkat/ Golongan </p>
                   <p style="margin:2px; margin-left:25px;">b. Jabatan</p>
                   <p style="margin:2px; margin-left:25px;">c. Gaji Pokok</p>
                   <p style="margin:2px; margin-left:25px;">d. Tingkat menurut Peraturan Perjalanan Dinas</p>

                </td>
                <td style="padding-left:5px;">
                    <p style="margin:2px">{{ $sppd->karyawan->pangkat->pangkat }}</p>
                   <p style="margin:2px; ">{{ $sppd->karyawan->jabatan->jabatan }}</p>
                   <p style="margin:2px; ">-</p>
                   <p style="margin:2px; ">-</p>
                </td>
            </tr>
            <tr>
                <td style="padding-left:5px; padding-bottom:15px;">
                    <p>04.	Maksud Perjalanan Dinas</p>

                </td>
                <td style="padding-left:2px; padding-bottom:15px;">
                   &nbsp; {{ $sppd->kegiatan->kegiatan }}
                </td>
            </tr>
            <tr>
                <td style="padding-left:5px; padding-bottom:10px;">
                    <p>05.	Alat angkutan yang dipergunakan </p>

                </td>
                <td style="padding-left:2px; padding-bottom:10px;">
                   &nbsp; {{ $sppd->transportasi->transportasi }}
                </td>
            </tr>
            <tr>
                <td style="padding-left:5px;">
                   <p style="margin:0px">06. a.Tempat berangkat </p>
                   <p style="margin:2px; margin-left:25px;">b.	Tempat tujuan </p>
                </td>
                <td style="padding-left:5px;">
                    <p style="margin:0px">Disdik Kab.Tapin </p>
                   <p style="margin:2px; ">{{ $sppd->tujuan->tujuan }}, Kab. {{ $sppd->tujuan->kabupaten->kabupaten }}</p>
                </td>
            </tr>
            <tr>
                <td style="padding-left:5px;">
                   <p style="margin:0px">07. a.	Lamanya Perjalanan Dinas</p>
                   <p style="margin:2px; margin-left:25px;">b. Tanggal Berangkat</p>
                   <p style="margin:2px; margin-left:25px;">c. Tanggal Kembali</p>
                </td>
                <td style="padding-left:5px;">
                    <p style="margin:2px"> {{ $lama_perjalanan }} Hari</p>
                   <p style="margin:2px; ">{{ $tgl_b }}</p>
                   <p style="margin:2px; ">{{ $tgl_k }}</p>
                </td>
            </tr>
            <tr>
                <td style="padding-left:5px; padding-bottom:5px;">
                    <p>08.	Pengikut  :    -  orang	Nama  </p>
                </td>
                <td style="padding-left:5px; padding-bottom:5px;">
                   &nbsp; -
                </td>
            </tr>
            <tr>
                <td style="padding-left:5px;">
                   <p style="margin:0px">09. Pembebanan Anggaran</p>
                   <p style="margin:2px; margin-left:25px;">a. SKPD</p>
                   <p style="margin:2px; margin-left:25px;">c. Kode Rekening </p>
                </td>
                <td style="padding-left:5px;">
                    <p style="margin:2px"></p>
                   <p style="margin:2px; ">{{ $sppd->anggaran->pembebanan }}</p>
                   <p style="margin:2px; ">{{ $sppd->anggaran->akun }}</p>
                </td>
            </tr>
            <tr>
                <td style="padding-left:5px; padding-bottom:10px;">
                    <p>10.	Keterangan </p>
                </td>
                <td style="padding-left:5px; padding-bottom:10px;">
                   &nbsp; {{ $sppd->keterangan }}
                </td>
            </tr>
        </table>
        </section>
        <div class="ttd">
        <h5 style="margin:2px;"> Dikeluarkan  di &nbsp;	:	Rantau  </h5>
            <h5 style="margin:2px;">Pada Tanggal &nbsp; &nbsp;	:	{{ $tgl }}</h5>
            <hr>
            <h5 style="margin:2px; text-align: center"> An. Bupati Tapin </h5>
            <h5 style="margin:2px; text-align: center">Kepala Dinas Pendidikan Kabupaten Tapin,</h5>
            <br>
            <br>
            <h5 style="margin:2px; text-align: center">{{ $sppd->pejabat->nama }}</h5>
            <h5 style="margin:2px; text-align: center"> Pembina Utama Muda</h5>
            <h5 style="margin:2px; text-align: center">NIP. {{ $sppd->pejabat->nip }}</h5>
        </div>
        <br>
        <br>
        <br>
        <section class="header2">
        <h5 style="margin:2px; ">I. Berangkat dari  &nbsp;	:Disdik Tapin</h5>
        <h5 style="margin:2px; margin-left:15px;">(Tempat kedudukan)	&nbsp; :Rantau</h5>
        <h5 style="margin:2px; margin-left:15px;">Pada tanggal &nbsp;	: {{ $tgl_b }}</h5>
        <h5 style="margin:2px; margin-left:15px;">Ke &nbsp;	: {{ $sppd->tujuan->tujuan }}, Kab/Kota. {{ $sppd->tujuan->kabupaten->kabupaten }}</h5>
        <hr style="margin:2px; height:1px;">
        <h5 style="margin:2px; margin-left:15px;"> An. Bupati Tapin </h5>
        <h5 style="margin:2px; margin-left:15px;"> Kepala Dinas Pendidikan Kabupaten Tapin,</h5>
        <br>
        <br>
        <h5 style="margin:2px; margin-left:15px;"> <b> {{ $sppd->pejabat->nama }} </b></h5>
        <h5 style="margin:2px; margin-left:15px;"> <b> Pembina Utama Muda </b></h5>
        <h5 style="margin:2px; margin-left:15px;"> <b> NIP. {{ $sppd->pejabat->nip }}</b></h5>
        <br>
     </section>
     <section>
        <table style="margin-bottom:20px;">
            <tr>
                <td style="padding-left:5px; padding-bottom:60px">
                   <p style="margin:0px;">II.	Tiba di: {{ $sppd->tujuan->tujuan }}, Kab/Kota. {{ $sppd->tujuan->kabupaten->kabupaten}} </p>
                   <p style="margin:2px; margin-left:25px;">Pada Tanggal	: {{ $tgl_b }} </p>
                   <p style="margin:2px; margin-left:25px;">&nbsp</p>

                </td>
                <td style="padding-left:5px; padding-bottom:60px">
                    <p style="margin:0px">Berangkat dari	: Disdik Tapin (Rantau) </p>
                   <p style="margin:2px; ">Ke  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;	: {{ $sppd->tujuan->tujuan }}, Kab/Kota. {{ $sppd->tujuan->kabupaten->kabupaten}}</p>
                   <p style="margin:2px; ">Pada Tanggal	&nbsp; : {{ $tgl_b }} </p>
                </td>
            </tr>
            <tr>
                <td style="padding-left:5px; padding-bottom:60px">
                   <p style="margin:0px">III.	Tiba di: </p>
                   <p style="margin:2px; margin-left:25px;">Pada Tanggal	: </p>
                   <p style="margin:2px; margin-left:25px;"></p>

                </td>
                <td style="padding-left:5px; padding-bottom:60px">
                    <p style="margin:0px">Berangkat dari	:  </p>
                   <p style="margin:2px; ">Ke  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;	: </p>
                   <p style="margin:2px; ">Pada Tanggal	&nbsp; : </p>
                </td>
            </tr>
            <tr>
                <td style="padding-left:5px; padding-bottom:60px">
                   <p style="margin:0px">IV.	Tiba di: </p>
                   <p style="margin:2px; margin-left:25px;">Pada Tanggal	: </p>
                   <p style="margin:2px; margin-left:25px;">&nbsp</p>

                </td>
                <td style="padding-left:5px; padding-bottom:60px">
                    <p style="margin:0px">Berangkat dari	:  </p>
                   <p style="margin:2px; ">Ke  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;	: </p>
                   <p style="margin:2px; ">Pada Tanggal	&nbsp; : </p>
                </td>
            </tr>
            <tr>
                <td style="padding-left:5px; padding-bottom:30px">
                   <p style="margin:0px">V.	Tiba kembali di: Rantau- Kab.Tapin
                </p>
                   <p style="margin:2px; margin-left:25px;">(Tempat kedudukan) tgl. {{ $tgl_k }}</p>
                   <br>
                   <p style="margin:2px; margin-left:25px; text-align: center;">Pejabat yang memberi perintah</p>
                   <p style="margin:2px; margin-left:25px; text-align: center;">An. Bupati Tapin</p>
                   <p style="margin:2px; margin-left:25px; text-align: center;">Kepala Dinas Pendidikan Kabupaten Tapin</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p style="margin:2px; margin-left:25px; text-align: center;"><b>{{ $sppd->pejabat->nama }}</b> </p>
                    <p style="margin:2px; margin-left:25px; text-align: center;"><b>Pembina Utama Muda</b> </p>
                    <p style="margin:2px; margin-left:25px; text-align: center;"><b>NIP. {{ $sppd->pejabat->nip }} </b> </p>

                </td>
                <td style=" width:50%; padding-left:5px; padding-bottom:30px">
                    <p style="margin:6px; text-align: justify; ">Telah diperiksa dengan keterangan bahwa perjalanan tersebut diatas benar-benar dilakukan atas perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat singkatnya.</p>
                    <br>
                    <p style="margin:2px; margin-left:25px; text-align: center;">Pejabat yang memberi perintah</p>
                    <p style="margin:2px; margin-left:25px; text-align: center;">An. Bupati Tapin</p>
                    <p style="margin:2px; margin-left:25px; text-align: center;">Kepala Dinas Pendidikan Kabupaten Tapin</p>
                    <br>
                    <br>
                    <br>
                    <p style="margin:2px; margin-left:25px; text-align: center;"><b>{{ $sppd->pejabat->nama }}</b> </p>
                    <p style="margin:2px; margin-left:25px; text-align: center;"><b>Pembina Utama Muda</b> </p>
                    <p style="margin:2px; margin-left:25px; text-align: center;"><b>NIP. {{ $sppd->pejabat->nip }}</b> </p>

                </td>
            </tr>
            <tr>
                <td colspan="2"  style=" padding-left:5px; padding-right: 5px; padding-bottom:30px">
                   <p style="margin:0px">VII.  Perhatian: </p>
                   <p style="margin:2px; margin-left:25px; text-align: justify;">Pejabat yang berwenang memberikan  SPPD, Pegawai yang melakukan perjalanan Dinas, para pejabat yang mengesahkan tanggal berangkat / tiba, serta bendaharawan bertanggung jawab berdasarkan peraturan Pemerintah apabila Negara menderita kerugian akibat kesalahan kelalaian dan kealpaan     (PP Nomor  5  Tahun  1975, LNRI  Tahun  1975  Nomor  5 ) </p>
                </td>
            </tr>
        </table>
     </section>
</body>
</html>
