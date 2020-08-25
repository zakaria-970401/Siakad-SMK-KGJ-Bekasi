@extends ('layout.masterguru')

@section('judul', 'Daftarr WALI Kelas')

@section('konten')



 <!-- Bordered Table -->
    <div class="content">
        <div class="block">
                        <div class="block-header bg-light">
                            <h3 class="block-title"> Data Wali Kelas</h3>
                            <a href="/guru/pdfdatakelas" class="btn btn-outline-danger mr-5 mb-15">
                                <i class="fa fa-file-pdf-o mr-5"></i>Export To PDF
                            </a>
                        <br>
                  </div>
                    <div class="block">
                       <table class="table table-bordered table-vcenter">
                            <thead class="bg-info">
                                    <tr>
                                        <th class="text-center">NO.</th>
                                        <th class="text-center">NUPTK</th>
                                        <th class="text-center">Nama Guru</th>
                                        <th class="text-center">WALIKELAS</th>
                                        <th class="text-center">AKSI</th>
                                    </tr>
                                </thead>
                                     <tbody>
                                     @foreach ($guru as $walas)
                                        <tr>
                                        <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                        <td class="text-center">{{$walas->nuptk}}</td>
                                        <td class="text-center">{{$walas->namaguru}}</td>
                                        <td class="text-center">{{$walas->kelas}}</td>
                                        <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-success"><i class="si si-eye mr-5"></i>Lihat</a>
                                        </tr>
                                        </td>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection
