@extends ('layout.masterguru')

@section('judul', 'Data Akun Siswa')

@section('konten')

<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">DATA AKUN SMK KARYA GUNA JAYA</h3>
                <a href="/guru/pdfakunsiswa" class="btn btn-outline-danger mr-5 mb-15"><i class="fa fa-file-pdf-o mr-5"></i>Export To PDF</a>
                <a href="/guru/eksportakunsiswa" class="btn btn-outline-success mr-5 mb-15">
                <i class="fa fa-upload mr-5"></i>Eksport To Excel</button></a>
            </div>
        <div class="content">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead class="thead bg-info">
                    <th class="text-center">NO</th>
                    <th class="text-center">Nama Siswa</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Email</th>
                    <th class="text-center" style="width: 25%;">Foto</th>
                    <th class="text-center" style="width: 15%;">Status Akun</th>
                    <th class="text-center">AKSI</th>
                </thead>
            <tbody>
                @foreach($akunsiswa as $ak)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">{{$ak->namasiswa}}</td>
                        <td class="text-center">{{$ak->kelas}}</td>
                        <td class="text-center">{{$ak->email}}</td>
                        <td class="text-center"><img src="{{ asset('avasiswa/'.$ak->foto)}}" style = "height: 80px; width: 85px;" alt=""></td>
                        <td class="text-center">@if($ak->status_akun== 0)<span class="badge badge-danger">Belum Diverifikasi</span>@else<span class="badge badge-success">Terverifikasi</span>@endif
                        <td class="text-center">
                        <a href="/guru/detailakunsiswa/{{$ak->id}}" class="btn btn-sm btn-primary inline"><i class="fa fa-eye mr-5"></i>Detail</a>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
        

@endsection