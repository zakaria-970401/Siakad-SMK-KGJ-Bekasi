@extends ('layout.masteradmin')

@section('judul', 'Page Insert Data Siswa')

@section('konten')
<!-- Main Container -->

<!-- Dynamic Table Full -->
<div class="content-block">
<div class="block">

<div class="block-header block-header-default">
    <h3 class="block-title">DATA SISWA SMK KARYA GUNA JAYA</h3>
</div>

<div class="block-content block-content-full">
<div class="mb-10">
        <button type="button" class="btn btn-info mr-5 mb-15" data-toggle="modal" data-target="#modal-popout">
            <i class="fa fa-plus mr-5"></i>Tambah Data Siswa
        </button>

        <a href="/insertsiswa/importexcel" class="btn btn-success mr-5 mb-15">
            <i class="fa fa-file-excel-o mr-5"></i>Import Excel Data Siswa
        </button></a>
        </div>
        

    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
        <thead class="thead-dark">
        <th class="text-center">NO</th>
                <th class="text-center">Nama Siswa</th>
                <th class="text-center">NISN</th>
                <th class="text-center">Jurusan</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">Kota Kelahiran</th>
                <th class="text-center">Tanggal Lahir</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Agama</th>
                <th class="text-center">Foto</th>
                <th class="text-center" style="width: 10%;">AKSI</th>
        </thead>
        <tbody>
        @foreach($siswa as $sw)
            <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center"><a href="/masterdetailsiswa/{{$sw->id}}">{{$sw->namasiswa}}</a></td>
                <td class="text-center">{{$sw->nisn}}</td>
                <td class="text-center">{{$sw->jurusan}}</td>
                <td class="text-center">{{$sw->kelas}}</td>
                <td class="text-center">{{$sw->kotakelahiran}}</td>
                <td class="text-center">{{$sw->tgllahir}}</td>
                <td class="text-center">{{$sw->jeniskelamin}}</td>
                <td class="text-center">{{$sw->agama}}</td>
                <td class="text-center"><img src="{{ asset('fotosiswa/'.$sw->foto)}}" style = "height: 80px; width: 85px;" alt=""></td>
                
                
                <td class="text-center">
                <a href="/masterdetailsiswa/{{ $sw -> id}}" class="btn btn-sm btn-primary mb-10"><i class="si si-eye mr-5"></i>Detail</a>
                
                
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
<div class="modal fade" id="modal-popout" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
<div class="modal-dialog modal-dialog-popout" role="document">
<div class="modal-content">
<div class="block block-themed block-transparent mb-0">
<div class="block-header bg-primary-dark">
    <h3 class="block-title">Tambah Data Siswa</h3>
    <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
            <i class="si si-close"></i>
        </button>
    </div>
</div>
<br>
        <div class="col-xl-10">
            <form class="js-validation-bootstrap" action="/insertsiswa" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="namasiswa">Nama Siswa</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('namasiswa') is-invalid @enderror" id="namasiswa" name="namasiswa" autocomplete="off" value="{{old('namasiswa')}}" onfocus() >
                    </div>
                    @error ('namasiswa')
                    <div class="invalid-feedback">
                {{$message}}
</div>
    @enderror
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="nisn">NISN</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" autocomplete="off" value="{{old('nisn')}}">
                    @error ('nisn')
                    <div class="invalid-feedback">
                {{$message}}
</div>
    @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="jurusan">Jurusan </label>
                    <div class="col-lg-6">
                        <select class="form-control" id="jurusan" name="jurusan" autocomplete="off">
                            <option value="TKJ">TKJ</option>
                            <option value="TKR">TKR</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="kelas">Kelas</label>
                    <div class="col-lg-8">
                        <select class="js-select2 form-control" id="kelas" name="kelas" style="width: 100%;" autocomplete="off"  >
                        @foreach ($kelas as $k)
                            <option value="{{$k->kelas}}">{{$k->kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="kotakelahiran">Kota Kelahiran </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('kotakelahiran') is-invalid @enderror" id="kotakelahiran" name="kotakelahiran" autocomplete="off" value="{{old('kotakelahiran')}}" >
                    </div>
                    @error ('kotakelahiran')
                    <div class="invalid-feedback">
                {{$message}}
</div>
    @enderror
                </div>

                
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="tgllahir">Tanggal Lahir </label>
                    <div class="col-lg-8">
                    <input type="text" class="js-datepicker form-control @error('tlglahir') is-invalid @enderror" id="tgllahir" name="tgllahir" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yy/mm/dd" placeholder="yy/mm/dd" autocomplete="off" value="{{old('tgllahir')}}" >
                    </div>
                    @error ('tgllahir')
                    <div class="invalid-feedback">
                {{$message}}
</div>
    @enderror
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="jeniskelamin">Jenis Kelamin</label>
                    <div class="col-lg-6">
                        <select class="form-control" id="jeniskelamin" name="jeniskelamin" autocomplete="off" >
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="agama">Agama</label>
                    <div class="col-lg-8">
                        <select class="js-select2 form-control" id="agama" name="agama" style="width: 100%;" autocomplete="off" >
                        @foreach ($agama as $a)
                            <option value="{{$a->agama}}">{{$a->agama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="namaayah">Nama Ayah </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('namaayah') is-invalid @enderror" id="namaayah" name="namaayah" autocomplete="off" value="{{old('namaayah')}}" >
                    </div>
                    @error ('namaayah')
                    <div class="invalid-feedback">
                {{$message}}
</div>
    @enderror
                </div>

                
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="namaibu">Nama Ibu </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('namaibu') is-invalid @enderror" id="namaibu" name="namaibu"  autocomplete="off" value="{{old('namaibu')}}" >
                    </div>
                    @error ('namaibu')
                    <div class="invalid-feedback">
                {{$message}}
</div>
    @enderror
                </div>

                
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="anakke">Anak Ke </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('anakke') is-invalid @enderror" id="anakke" name="anakke" autocomplete="off" value="{{old('anakke')}}" >
                    </div>
                    @error ('anakke')
                    <div class="invalid-feedback">
                {{$message}}
</div>
    @enderror
                </div>

                
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="alamatortu">Alamat Wali </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('alamatortu') is-invalid @enderror" id="alamatortu" name="alamatortu" autocomplete="off"  value="{{old('alamatortu')}}">
                    </div>
                    @error ('alamatortu')
                    <div class="invalid-feedback">
                {{$message}}
</div>
    @enderror
                </div>

                
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="no_teleponortu">No. Telpon Wali </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('no_teleponortu') is-invalid @enderror" id="no_teleponortu" name="no_teleponortu" autocomplete="off" value="{{old('no_teleponortu')}}">
                    </div>
                    @error ('no_telponortu')
                    <div class="invalid-feedback">
                {{$message}}
</div>
    @enderror
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="pekerjaanayah">Pekerjaan Ayah </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('pekerjaanayah') is-invalid @enderror" id="pekerjaanayah" name="pekerjaanayah" autocomplete="off" value="{{old('pekerjaanayah')}}" >
                    </div>
                    @error ('pekerjaanayah')
                    <div class="invalid-feedback">
                {{$message}}
</div>
    @enderror
                </div>
                
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="pekerjaanibu">Pekerjaan Ibu </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('pekerjaanibu') is-invalid @enderror" id="pekerjaanibu" name="pekerjaanibu" autocomplete="off" value="{{old('pekerjaanibu')}}" >
                    </div>
                    @error ('pekerjaanibu')
                    <div class="invalid-feedback">
                {{$message}}
</div>
    @enderror
                </div>

                <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="foto">Foto Siswa </label>
                                        <div class="col-lg-8">
                                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" autocomplete="off" value="{{old('foto')}}"> <span class="text-danger">*Maksimal 2MB</span>
                                        </div>
                                        @error ('foto')
                                        <div class="invalid-feedback">
                                    {{$message}}
                    </div>
                        @enderror
                                    </div>

                <div class="form-group row">
                    <div class="col-lg-8 ml-auto">
                        <button type="submit" class="btn btn-alt-primary">Simpan!</button>
                    </div>
                </div>
            </form>
        </div>



@endsection