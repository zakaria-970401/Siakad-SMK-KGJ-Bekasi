@extends ('layout.masterguru')

@section('judul', 'Daftar Data Siswa ')

@section('konten')
<!-- Main Container -->

<!-- Dynamic Table Full -->
<div class="content">
<div class="block">
<div class="block-header bg-light">
    <h1 class="block-title"><strong>DATA SISWA SMK KARYA GUNA JAYA</h1></strong>
    <a href="/guru/pdfdatasiswa" class="btn btn-outline-danger mr-5 mb-15">
                    <i class="fa fa-file-pdf-o mr-5"></i>Export To PDF
                </a>
                <a href="/guru/eksportdatasiswa" class="btn btn-outline-success mr-5 mb-15">
                    <i class="fa fa-file-excel-o mr-5"></i>Export To Excel
                </a>
        </div>
        <div class="block-content block-content-full">
        <div class="col-xl-6">
        <form action="/guru/daftardatasiswa" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
         <div class="form-group row">
                <label class="col-2 mt-5" for="val-select2">Pilih Kelas</span></label>
                <div class="col-6">
                    <select class="js-select2 form-control" id="kelasiswa" name="kelasiswa" style="width: 100%;" data-placeholder="Cari Sesuai Kelas..">
                    @foreach($kelas as $kls)
                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        <option value="{{$kls->kelas}}">{{$kls->kelas}}</option>
                    @endforeach
                    </select>
                </div>
                <br>
                <br>
                    <div class="col-lg-4 ml-auto">
                        <button type="submit" class="btn btn-outline-dark mr-5 mb-5">
                            <i class="fa fa-search mr-5"></i>Cari
                        </button>
                    </div>
                </div>
            </div>
        </form>
          <div class="content">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead class="thead-dark">
                       <th class="text-center">NO</th>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">NISN</th>
                        <th class="text-center">Jurusan</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Kota Kelahiran</th>
                        <th class="text-center">Tanggal Lahir</th>
                        <th class="text-center">Agama</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center" style="width: 20%;">AKSI</th>
                </thead>
                <tbody>
                @forelse($datasiswa as $si)
                    <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">{{$si->namasiswa}}</a></td>
                        <td class="text-center">{{$si->nisn}}</td>
                        <td class="text-center">{{$si->jurusan}}</td>
                        <td class="text-center">{{$si->kelas}}</td>
                        <td class="text-center">{{$si->kotakelahiran}}</td>
                        <td class="text-center">{{$si->tgllahir}}</td>
                        <td class="text-center">{{$si->agama}}</td>
                        <td class="text-center"><img src="{{ asset('fotosiswa/'.$si->foto)}}" style = "height: 80px; width: 80px;" alt=""></td>
                        <td class="text-center">
                        <a href="/guru/detaildatasiswa/{{$si->id}}" class="btn btn-sm btn-primary mb-5"><i class="si si-eye mr-5"></i>Detail</a>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>





@endsection