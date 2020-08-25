@extends ('layout.masterguru')

@section('judul', 'Data Verifikasi Absensi Siswa')

@section('konten')
<!-- Main Container -->

<!-- Dynamic Table Full -->
<br>
           
            
<div class="content">
     <div class="block">
        <div class="block-header bg-info">
            <h3 class="block-title"><strong>DATA ABSENSI TERVERIFIKASI SISWA SMK KARYA GUNA JAYA</strong></h3>
    </div>                
        <div class="block">
            <div class="content">
            <form action="/guru/laporanabsenkategori" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row items-push">
                    <!-- Datepicker (Bootstrap forms) -->
                    <div class="col-xl-6">
                        <form action="be_forms_plugins.html" method="post">
                            <div class="form-group row">
                                <label class="col-12" for="example-datepicker1">Lihat Sesuai tanggal</label>
                                <div class="col-lg-8">
                                    <input type="text" class="js-datepicker form-control" id="kategori_tglabsen" name="kategori_tglabsen" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yy/mm/dd" placeholder="mm/dd/yy" autocomplete="off">
                                </div>
                    <div class="col-lg-4 ml-auto">
                        <button type="submit" class="btn btn-outline-dark mr-5 mb-5">
                            <i class="fa fa-search mr-5"></i>Cari
                           </button>
                         </div>
                      </form>
                    </div>
            <form action="/guru/laporanabsenkategorikelas" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row items-push">
                    <!-- Datepicker (Bootstrap forms) -->
                    <div class="col-xl-12">
                        <form action="be_forms_plugins.html" method="post">
                            <div class="form-group row">
                                <label class="col-12" for="example-datepicker1">Lihat Sesuai Kelas</label>
                                <div class="col-lg-8">
                                <select class="js-select2 form-control" id="kategorikelas" name="kategorikelas" style="width: 100%;" data-placeholder="Pilih ..">
                        @foreach ($kelas as $kls)
                            <option></option><!-- Required for data-placeholder attribute to workls with Select2 plugin -->
                            <option value="{{$kls->kelas}}">{{$kls->kelas}}</option>
                        @endforeach
                            </select>
                        </div>
                    <div class="col-lg-4 ml-auto">
                        <button type="submit" class="btn btn-outline-dark mr-5 mb-5">
                            <i class="fa fa-search mr-5"></i>Cari
                           </button>
                         </div>
                      </form>
                    </div>
                </div>
                </div>
                </div>
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead class="thead-dark">
                        <th class="text-center">NO</th>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Tanggal Absen</th>
                        <th class="text-center">Jam Masuk</th>
                        <th class="text-center">Jam Keluar</th>
                        <th class="text-center">Catatan</th>
                        <th class="text-center">Status Kehadiran</th>
                        <th class="text-center">Status Absen</th>
                        <th class="text-center" style="width: 27%;">AKSI</th>
                    </thead>
            <tbody>
                @foreach($absen as $ak)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">{{$ak->namasiswa}}</td>
                        <td class="text-center">{{$ak->kelas}}</td>
                        <td class="text-center">{{$ak->tglabsen}}</td>
                        <td class="text-center">{{$ak->jam_masuk}}</td>
                        <td class="text-center">{{$ak->jam_keluar}}</td>
                        <td class="text-center">{{$ak->keterangan}}</td>
                        <td class="text-center">
                        @if($ak->sakit== 1)<span class="badge badge-danger"><strong>Sakit</strong></span>
                        @elseif($ak->izin== 1)<span class="badge badge-warning">Izin</span>
                        @else<span class="badge badge-success">Hadir</span>
                        @endif
                        </td>
                        <td class="text-center">@if($ak->status_absen== 1)<span class="badge badge-success">Diterima</span>@else<span class="badge badge-danger">Ditolak</span>@endif </td>
                        
                        <td class="text-center">    
                        <a href="/guru/verifikasiabsen/{{$ak->id}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Lihat"><i class="fa fa-eye mr-5"></i></a>
                        
                        <a href="/guru/editabsensiswa/{{$ak->id}}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil mr-5"></i></a>
                     </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>





@endsection