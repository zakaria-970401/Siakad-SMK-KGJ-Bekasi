@extends ('layout.masterguru')

@section('judul', 'Detail Data Kelas')

@section('konten')



 <!-- Bordered Table -->
 <div class="content">
        <div class="blocks">
                        <div class="block-header bg-light">
                            <h3 class="block-title">Detail Data Kelas</h3>
                            <a href="/guru/pdfdatakelas" class="btn btn-outline-danger mr-5 mb-15">
                                <i class="fa fa-file-pdf-o mr-5"></i>Export To PDF
                            </a>
                        <br>
                  </div>
                        <div class="block-content">
                            <table class="table table-bordered table-vcenter">
                            <thead class="bg-info">
                                    <tr>
                                        <th class="text-center">NO.</th>
                                        <th class="text-center">Nama Siswa</th>
                                        <th class="text-center">KELAS</th>
                                        <th class="text-center">WALI KELAS</th>
                                    </tr>
                                </thead>
                                     <tbody>
                                     @foreach ($kelas as $kls)
                                        <tr>
                                        <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                        <td class="text-center">{{$kls->namasiswa}}</td>
                                        <td class="text-center">{{$kls->kelas}}</td>
                                        <td class="text-center">{{$kls->namaguru}}</td>
                                        </tr>
                                        </td>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
    

@endsection
