@extends ('layout.masteradmin')

@section('judul', 'Master Detail Wali Kelas')

@section('konten')



<!-- Bordered Table -->
<div class="content">
<div class="block">
            <div class="block-header bg-light">
                <h3 class="block-title"> Master Detail Wali Kelas</h3>
                <a href="#" class="btn btn-outline-danger mr-5 mb-15">
                    <i class="fa fa-file-pdf-o mr-5"></i>Export To PDF
                </a>
            <br>
        </div>
        <div class="block">
            <table class="table table-bordered table-vcenter">
                <thead class="bg-info">
                        <tr>
                            <th class="text-center">NO.</th>
                            <th class="text-center">NISN</th>
                            <th class="text-center">NAMA SISWA</th>
                            <th class="text-center">KELAS</th>
                            <th class="text-center">WALIKELAS</th>
                        </tr>
                    </thead>
                            <tbody>
                            @foreach ($walikelas as $walas)
                            <tr>
                            <th class="text-center" scope="row">{{$loop->iteration}}</th>
                            <td class="text-center">{{$walas->nisn}}</td>
                            <td class="text-center">{{$walas->namasiswa}}</td>
                            <td class="text-center"><input type="hidden" name="kelas[]" id="kelas" value="{{$walas->kelas}}" readonly>{{$walas->kelas}}
                            <td class="text-center">{{$walas->namaguru}}</td>
                            </tr>
                        </td>
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
