@extends ('layout.masteradmin')

@section('judul', 'Master Data Guru')

@section('konten')
<!-- Main Container -->

<!-- Dynamic Table Full -->
<div class="content">
<div class="block">
<div class="block-header block-header-default">
    <h1 class="block-title"><strong>DATA GURU SMK KARYA GUNA JAYA</h1></strong>
    <a href="/pdfdataguru" class="btn btn-outline-danger mr-5 mb-15">
                    <i class="fa fa-file-pdf-o mr-5"></i>Export To PDF
                </a>
                <a href="/eksportdataguru" class="btn btn-outline-success mr-5 mb-15">
                    <i class="fa fa-file-excel-o mr-5"></i>Export To Excel
                </a>
        </div>
         <div class="block-content block-content-full">
         <div class="col-2 col-xl-2">
            <div class="mr-2  d-inline">
                <a href="/insertguru/importexcel" class="btn btn-success mr-5 mb-15">
                <i class="fa fa-file-excel-o mr-5"></i>Import Excel Data Guru
            </button></a> 
            <button type="button" class="btn btn-info mr-5 mb-15 center-block" data-toggle="modal" data-target="#modal-popout">
            <i class="fa fa-plus mr-5"></i>Tambah Data Guru
        </button>
        </div> 
    </div> 
    <div class="col-xl-6">
        <form action="/masterdataguru" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
         <div class="form-group row">
                <label class="col-2 mt-5" for="val-select2">Cari Guru</span></label>
                <div class="col-6">
                    <select class="js-select2 form-control" id="gurumapel" name="gurumapel" style="width: 100%;" data-placeholder="Cari Sesuai Guru Mapel..">
                    @foreach($mapel as $mpl)
                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        <option value="{{$mpl->namamapel}}">{{$mpl->namamapel}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-lg-4 ml-auto">
                        <button type="submit" class="btn btn-outline-dark mr-5 mb-5">
                            <i class="fa fa-search mr-5"></i>Cari
                        </button>
                    </div>
                 </form> 
            </div>
        </div>
       <table class="table table-bordered table-striped table-vcenter  js-dataTable-full">
            <thead class="bg-info">
                <th class="text-center">NO</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">NUPTK</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Mapel</th>
                        <th class="text-center">Kota Kelahiran</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center" style="width: 20%;">AKSI</th>
                </thead>
                <tbody>
                @foreach($guru as $aa)
                    <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">{{$aa->namaguru}}</a></td>
                        <td class="text-center">{{$aa->nuptk}}</td>
                        <td class="text-center">{{$aa->jabatan}}</td>
                        <td class="text-center">{{$aa->mapel}}</td>
                        <td class="text-center">{{$aa->Kotakelahiran}}</td>
                        <td class="text-center">{{$aa->alamat}}</td>
                        <td class="text-center"><img src="{{ asset('fotoguru/'.$aa->foto)}}" style = "height: 80px; width: 80px;" alt=""></td>
                        
                        <td class="text-center">
                            <div class="btn-group">
                            <a href="/getupdatedataguru/{{$aa->id}}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit" >
                            <i class="fa fa-pencil"></i>
                        </a>
                    </div>

                    <form action="/hapusdataguru/{{$aa->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus">
                    <i class="fa fa-trash"></i>
                    </button>
                </form>
            </form>
        </tr>           
     @endforeach                    
    </tbody>
  </table>
 </div>

        <div class="modal fade" id="modal-popout" tabindex="-1" role="dialog" Saria-labelledby="modal-popout" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popout" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-dark">
            <h3 class="block-title">Tambah Data Guru</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                    <i class="si si-close"></i>
                </button>
            </div>
        </div>
        <br>
                <div class="col-xl-10">
                    <form class="js-validation-bootstrap" action="/insertdataguru" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="namaguru">Nama Guru</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control @error('namaguru') is-invalid @enderror" id="namaguru" name="namaguru" autocomplete="off" value="{{old('namaguru')}}" onfocus() >
                            </div>
                            @error ('namaguru')
                            <div class="invalid-feedback">
                        {{$message}}
        </div>
            @enderror
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nuptk">NUPTK</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control @error('nuptk') is-invalid @enderror" id="nuptk" name="nuptk" autocomplete="off" value="{{old('nuptk')}}"><span class="text-danger">*Pasttikan 7 digit</span>
                            @error ('nuptk')
                            <div class="invalid-feedback">
                        {{$message}}
                          </div>
                         @enderror
                     </div>
                        </div>

                        <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="jurusan">Jabatan </label>
                                    <div class="col-lg-8">
                                        <select class="js-select2 form-control" id="jabatan" name="jabatan" style="width: 100%;" autocomplete="off">
                                        <option value="">--Pilih Jabatan--</option>
                                        @foreach ($jabatan as $jb )
                                        <option value="{{$jb->namajabatan}}">{{$jb->namajabatan}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="mapel">Guru Mapel </label>
                    <div class="col-lg-8">
                        <select class="js-select2 form-control" name="mapel[]" id="mapel"  style="width: 100%;"  multiple>
                        @foreach ($mapel as $mpl)
                            <option value="{{$mpl->namamapel}}">{{$mpl->namamapel}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="jeniskelamin">Jenis Kelamin</label>
                            <div class="col-lg-8">
                                <select class="form-control" id="jeniskelamin" name="jeniskelamin" autocomplete="off" >
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
             
                <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="Kotakelahiran">kota Kelahiran</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control @error('Kotakelahiran') is-invalid @enderror" id="Kotakelahiran" name="Kotakelahiran" autocomplete="off" value="{{old('Kotakelahiran')}}">
                            @error ('kotakelahiran')
                            <div class="invalid-feedback">
                        {{$message}}
                          </div>
                         @enderror
                     </div>
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
                    <label class="col-lg-4 col-form-label" for="alamat">Alamat </label>
                    <div class="col-lg-8">
                        <input type="textarea" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" autocomplete="off"  value="{{old('alamat')}}">
                    </div>
                 @error ('alamat')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="pendidikan">Pendidikan</label>
                            <div class="col-lg-8">
                                <select class="form-control" id="pendidikan" name="pendidikan" autocomplete="off" >
                                    <option value="">--Pilih Pendidikan--</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                </select>
                            </div>
                        </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="nohp">No. HP </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="nohp" name="nohp" autocomplete="off"  value="{{old('nohp')}}">
                    </div>
                 @error ('nohp')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
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
                <label for="password" class="col-lg-4 col-form-label">{{ __('Konfirmasi Password') }}</label>

                <div class="col-lg-8">
                    <input id="password" type="password" class="form-control" name="password_confirmation" id ="password_confirmation" required autocomplete="off">
                </div>
            </div>

                    <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="foto">Foto Profile Akun </label>
                            <div class="col-lg-8">
                            <input type="file" class="form-control" id="foto" name="foto"> <span class="text-danger">*Maksimal 2MB</span>
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