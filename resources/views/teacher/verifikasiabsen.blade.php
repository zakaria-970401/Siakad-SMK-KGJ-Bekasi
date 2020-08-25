@extends ('layout.masterguru')

@section('judul', 'Data Verifikasi Absensi Siswa')

@section('konten')
<!-- Main Container -->

<!-- Dynamic Table Full -->
<br>
           
            
<div class="content">
     <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">DATA VERIFIKASI ABSENSI SISWA SMK KARYA GUNA JAYA</h3>
    </div>                
        <div class="block">
            <div class="content">
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
                        <td class="text-center">@if($ak->status_absen== 0)<span class="badge badge-danger">Belum Diproses</span>@else<span class="badge badge-success">Verifikasi</span>@endif </td>
                        
                        <td class="text-center">    
                        <a href="/guru/verifikasiabsen/{{$ak->id}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Terima"><i class="fa fa-check mr-5"></i></a>
                        
                        <a href="/guru/tolakverifikasiabsen/{{$ak->id}}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Tolak"><i class="fa fa-close mr-5"></i></a>
                     </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

    
    </div>

    
    <div class="row">
                        <div class="col-xl-4">
                            <!-- Icon/Text Groups -->
                            
                                <div class="block-header bg-success">
                                    <h3 class="block-title">Permintaan Absen Hadir : {{$hadir}} Siswa</h3>
                                </div>
                                <br>
                                <div class="block-header bg-warning">
                                    <h3 class="block-title">Permintaan Absen Izin : {{$izin}} Siswa</h3>
                                </div>
                                <br>
                                <div class="block-header bg-danger">
                                    <h3 class="block-title">Permintaan Absen Sakit : {{$sakit}} Siswa</h3>
                                </div>
                                </div>
                                </div>
                                
                                





@endsection