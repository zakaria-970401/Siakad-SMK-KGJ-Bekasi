@extends ('layout.masteradmin')

@section('judul', 'Data Akun Siswa')

@section('konten')
<!-- Main Container -->

<!-- Dynamic Table Full -->
<br>
           
            
<div class="content-block">
<div class="block">
<div class="block-header block-header-default">
<h3 class="block-title">DATA AKUN SMK KARYA GUNA JAYA</h3>
<a href="/pdfakunsiswa" class="btn btn-outline-danger mr-5 mb-15">
                                <i class="fa fa-file-pdf-o mr-5"></i>Export To PDF
                            </a>

                            <a href="/eksportakunsiswa" class="btn btn-outline-success mr-5 mb-15">
                <i class="fa fa-upload mr-5"></i>Eksport To Excel
            </button></a>
</div>

        <div class="block-content block-content-full">
        <div class="col-2 col-xl-2">
                    <div class="mr-2  d-inline">
                <a href="/gettambahakunsiswa/importexcel" class="btn btn-success mr-5 mb-15">
                    <i class="fa fa-file-excel-o mr-5"></i>Import Excel Akun Siswa
                </button></a> 
                <button type="button" class="btn btn-primary mr-5 mb-15" data-toggle="modal" data-target="#modal-fromleft">
                        <i class="fa fa-plus mr-5"></i>Tambah Akun Siswa
                    </button>
                    </div>
                </div>

            
                

            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead class="thead-dark">
                <th class="text-center">NO</th>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Email</th>
                        <th class="text-center" style="width: 15%;">Foto</th>
                        <th class="text-center" style="width: 27%;">AKSI</th>
                        

                </thead>
                <tbody>
                @foreach($akun as $ak)
                    <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">{{$ak->namasiswa}}</td>
                        <td class="text-center">{{$ak->kelas}}</td>
                        <td class="text-center">{{$ak->email}}</td>
                        <td class="text-center"><img src="{{ asset('avasiswa/'.$ak->foto)}}" style = "height: 80px; width: 85px;" alt=""></td>
                        
                        
                        <td class="text-center">
                        <a href="/updateakunsiswa/{{$ak-> id}}" class="btn btn-sm btn-primary inline"><i class="si si-pencil mr-5"></i>Edit</a>
                        
                        <form action="/hapusakunsiswa/{{$ak->id}}" method="post" class="d-inline">
                    @method('delete')
                    {{ csrf_field() }}
                        <button type="submit" class="btn btn-sm btn-danger d-inline" value="Delete"><i class="fa fa-trash mr-5"></i>Hapus</button>
            
            </form>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
        <link rel="stylesheet" href="/assets/js/plugins/select2/css/select2.css">

        <div class="modal fade" id="modal-fromleft" tabindex="-1" role="dialog" aria-labelledby="modal-fromleft" aria-hidden="true">
<div class="modal-dialog modal-dialog-fromleft" role="document">
<div class="modal-content">
    <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
            <h3 class="block-title">Tambah Akun Siswa</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                    <i class="si si-close"></i>
                </button>
            </div>
        </div>
        <br>
                <div class="col-xl-10">
                    <form class="js-validation-bootstrap" action="/tambahakunsiswa" method="post">
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
                            <label class="col-lg-4 col-form-label" for="jeniskelamin">Jenis Kelamin</label>
                            <div class="col-lg-8">
                                <select class="form-control" id="jeniskelamin" name="jeniskelamin" autocomplete="off" >
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
            <label for="nohp" class="col-lg-4 col-form-label">{{ __('Nomer Heandphone ') }}</label>

            <div class="col-lg-8">
                <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ old('nohp') }}" required autocomplete="nohp" autofocus>

                @error('nohp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="Alamat" class="col-lg-4 col-form-label">{{ __('Alamat') }}</label>
            
            <div class="col-lg-8">
            <textarea class="form-control" rows="5" id="alamat" name="alamat"></textarea>
            @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="Agama" class="col-lg-4 col-form-label">{{ __('Agama') }}</label>
        
            <div class="col-lg-8">
        <select class="form-control" id="agama"name="agama">
        @foreach($agama as $agm)
            <option value="{{$agm->agama}}">{{$agm->agama}}</option>
            @endforeach
            </select>
         </div>
    </div>
        

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="jurusan">Jurusan </label>
                            <div class="col-lg-8">
                                <select class="form-control" id="jurusan" name="jurusan" autocomplete="off">
                                    <option value="TKJ">TKJ</option>
                                    <option value="TKR">TKR</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="kelas">Kelas</label>
                    <div class="col-lg-8">
                        <select class="js-select2 form-control" id="kelas" name="kelas" style="width: 100%;" autocomplete="off" data-placeholder="Choose one..">
                        @foreach ($kelas as $k)
                        <option></option>
                            <option value="{{$k->kelas}}">{{$k->kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

        <div class="form-group row">
            <label for="email" class="col-lg-4 col-form-label">{{ __('E-Mail Address') }}</label>

            <div class="col-lg-8">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-lg-4 col-form-label">{{ __('Password') }}</label>

            <div class="col-lg-8">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-lg-4 col-form-label">{{ __('Confirm Password') }}</label>

            <div class="col-lg-8">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>


                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-alt-primary">Simpan!</button>
                            </div>
                        </div>
                    </form>
                </div>

                

@endsection