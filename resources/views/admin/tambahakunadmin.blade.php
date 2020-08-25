    @extends ('layout.masteradmin')

    @section('judul', 'Data Akun Admin')

    @section('konten')
    <!-- Main Container -->

    <!-- Dynamic Table Full -->
    <br>
            
                
    <div class="content">
    <div class="block">
    <div class="block-header block-header-default">
    <h3 class="block-title">AKUN ADMIN APLIKASI ABSENSI SISWA KARYA GUNA JAYA</h3>
    <a href="/pdfakunadmin" class="btn btn-outline-danger mr-5 mb-15">
                                    <i class="fa fa-file-pdf-o mr-5"></i>Export To PDF
                                </a>

                                <a href="/eksportakunadmin" class="btn btn-outline-success mr-5 mb-15">
                    <i class="fa fa-upload mr-5"></i>Eksport To Excel
                </button></a>
    </div>

            <div class="block-content block-content-full">
            <div class="col-2 col-xl-2">
            <button type="button" class="btn btn-primary mr-5 mb-15" data-toggle="modal" data-target="#modal-fromleft">
                            <i class="fa fa-plus mr-5"></i>Tambah Akun Admin
                        </button>
                        </div>
            
                
                    

                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead class="thead-dark">
                    <th class="text-center">NO</th>
                            <th class="text-center">Nama Admin</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Agama</th>
                            <th class="text-center">Email</th>
                            <th class="text-center" style="width: 15%;">Foto</th>
                            <th class="text-center" style="width: 27%;">AKSI</th>
                            

                    </thead>
                    <tbody>
                    @foreach($akun as $ak)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$ak->nama}}</td>
                            <td class="text-center">{{$ak->jeniskelamin}}</td>
                            <td class="text-center">{{$ak->agama}}</td>
                            <td class="text-center">{{$ak->email}}</td>
                            <td class="text-center"><img src="{{ asset('fotoadmin/'.$ak->foto)}}" style = "height: 80px; width: 85px;" alt=""></td>
                            
                            
                            <td class="text-center">
                            <a href="/updateakunadmin/{{$ak-> id}}" class="btn btn-sm btn-primary inline"><i class="si si-pencil mr-5"></i>Edit</a>
                                
                            <a href="/hapusakunadmin/{{$ak-> id}}" class="btn btn-sm btn-danger d-inline" value="Delete"><i class="fa fa-trash mr-5"></i>Hapus</a>
                            </td>                  
                        </tr>
                        @endforeach       
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="modal-fromleft" tabindex="-1" role="dialog" aria-labelledby="modal-fromleft" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromleft" role="document">
    <div class="modal-content">
        <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">Tambah Akun Admin</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                        <i class="si si-close"></i>
                    </button>
                </div>
            </div>
            <br>
                    <div class="col-xl-10">
                        <form class="js-validation-bootstrap" action="/tambahakunadmin" method="post"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nama">Nama </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autocomplete="off" value="{{old('nama')}}" onfocus() >
                                </div>
                                @error ('nama')
                                <div class="invalid-feedback">
                            {{$message}}
            </div>
                @enderror
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="jeniskelamin">Jenis Kelamin</label>
                                <div class="col-lg-8">
                                    <select class="form-control" id="jeniskelamin" name="jeniskelamin" autocomplete="off" >
                                        <option value=" ">--Silahkan Pilih--</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Agama" class="col-lg-4 col-form-label">{{ __('Agama') }}</label>
                    
                        <div class="col-lg-8">
                    <select class="form-control" id="agama"name="agama">
                        <option value="">--Silahkan Pilih--</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>        
                        <option value="Katolik">Katolik</option>        
                        <option value="Budha">Budha</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Konghucu">Konghucu</option>        
                    </select>

                    @error('agama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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