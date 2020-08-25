@extends ('layout.masteradmin')

@section('judul', 'Halaman Edit Semester')


@section('konten')

<!-- Main Container -->

<!-- Dynamic Table Full -->
<br>
           
            
<div class="content">
     <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">SETTING TAHUN AJARAN SMK KARYA GUNA JAYA</h3>
    </div>                
        <div class="block">
            <div class="content">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead class="thead-dark">
                        <th class="text-center">NO</th>
                        <th class="text-center">Tahun Ajaran</th>
                        <th class="text-center">Semester</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </thead>
            <tbody>
                @foreach($thnajaran as $thn)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">{{$thn->tahunajaran}}</td>
                        <td class="text-center">
                        @if($thn->id_semester==1)<strong>Ganjil</strong>
                        @elseif($thn->id_semester==2)<strong>Genap</strong>
                        @endif
                        </td>
                        <td class="text-center">
                        @if($thn->status_semester==0)<span class="badge badge-danger"><strong>Tidak Aktif</strong></span>
                        @else<span class="badge badge-success">Sedang Aktif</span>
                        @endif
                        </td>   
                        <td class="text-center">    
                        <a href="/tahunajaran/{{$thn->id}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Aktifkan"><i class="fa fa-check mr-5"></i></a>
                        
                        <a href="/nonaktifkantahunajaran/{{$thn->id}}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Nonaktifkan"><i class="fa fa-close mr-5"></i></a>
                     </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
    
@endsection



