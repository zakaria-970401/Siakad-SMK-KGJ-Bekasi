@extends ('layout.masteradmin')

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
                        <td class="text-center">@if($ak->status_absen== 1)<span class="badge badge-success">Diterima</span>@elseif($ak->status_absen== 0)<span class="badge badge-warning">Sedang Diproses</span>@else<span class="badge badge-danger">Ditolak</span>@endif </td>
                        
                        <td class="text-center">    
                           <form action="/hapusabsensiswa/{{$ak->id}}" method="post">
                            @method('DELETE')
                            {{ csrf_field() }}
                            <a href="/detailabsen/{{$ak->id}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Lihat"><i class="fa fa-eye mr-5"></i></a>
                    
                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash mr-5"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>




@endsection