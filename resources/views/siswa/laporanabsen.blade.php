@extends ('layout.mastersiswa')

@section('judul', 'Master Absensi Siswa')

@section('konten')
<!-- Main Container -->

<!-- Dynamic Table Full -->
<div class="content">
<div class="block">
<div class="block-header block-header-default">
    <h1 class="block-title"><strong>HISTORI ABSENSI, {{Auth::user()->namasiswa}}</h1></strong>
    <a href="/pdfdataguru" class="btn btn-outline-danger mr-5 mb-15">
                    <i class="fa fa-file-pdf-o mr-5"></i>Export To PDF
                </a>
                <a href="/eksportdataguru" class="btn btn-outline-success mr-5 mb-15">
                    <i class="fa fa-file-excel-o mr-5"></i>Export To Excel
                </a>
        </div>
         <div class="block-content block-content-full">
         <form action="/laporanabsen" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row items-push">
                    <!-- Datepicker (Bootstrap forms) -->
                    <div class="col-xl-6">
                        <form action="be_forms_plugins.html" method="post">
                            <div class="form-group row">
                                <label class="col-12" for="example-datepicker1">Lihat Per-tanggal</label>
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
                </div>
            </div>

        <h5>Nama: {{Auth::user()->namasiswa}}
        <br><br>
        Kelas: {{Auth::user()->kelas}} 
        </h5>
        <table class="table table-bordered table-striped table-vcenter  js-dataTable-full">
            <thead class="bg-info">
                <th class="text-center">NO</th>
                        <th class="text-center">Tangal Absen</th>
                        <th class="text-center">Jam Masuk</th>
                        <th class="text-center">Jam Keluar</th>
                        <th class="text-center">Sakit</th>
                        <th class="text-center">Izin</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Status Absen</th>
                        <th class="text-center" style="width: 20%;">AKSI</th>
                </thead>
                <tbody>
                @foreach($absensiswa as $aa)
                    <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">{{$aa->tglabsen}}</a></td>
                        <td class="text-center">{{$aa->jam_masuk}}</td>
                        <td class="text-center">{{$aa->jam_keluar}}</td>
                        <td class="text-center">{{$aa->sakit}}</td>
                        <td class="text-center">{{$aa->izin}}</td>
                        <td class="text-center">{{$aa->keterangan}}</td>
                        <td class="text-center">@if($aa->status_absen== 1)<span class="badge badge-success">Diterima</span>@elseif($aa->status_absen== 2)<span class="badge badge-danger">Ditolak</span>@else<span class="badge badge-warning">Proses</span>@endif  </td>
                        <td class="text-center">
                            <div class="btn-group">
                            <a href="/detailabsen/{{$aa->id}}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Lihat" >
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                </tr>           
            @endforeach                    
            </tbody>
        </table>
        </div>
@endsection