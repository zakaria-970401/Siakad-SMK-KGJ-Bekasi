        @extends('layout/mastersiswa')

        @section('judul', 'Profile Siswa')


        @section('konten')

        <!-- Page Content -->
        <!-- User Info -->
        <div class="content">

        <div class="bg-image bg-image" style="background-image: url('assets/media/photos/photo13@2x.jpg');">
        <div class="bg-primary-dark-op py-10">
        <div class="content content-full text-center">
        <!-- Avatar -->
        <div class="mb-15">
        <a class="img-link" data-toggle="modal" href="#modal-fromleft">
        <img class="img-avatar" src="{{ asset('avasiswa/'.Auth::user()->foto)}}" style = "height: 220px; width: 230px; border-radius:50%; margin-right:15px;" alt="">
        </a>
        <!-- END Avatar -->

        <!-- Personal -->
        <h1 class="h3 text-white font-w700 mb-10">{{ Auth::user()->namasiswa }}</h1>
        <h2 class="h5 text-white-op">
        {{ Auth::user()->kelas }}<a class="text-primary-light"></h2>
        <!-- END Personal -->

        <!-- Actions -->
        <button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-success mb-5" data-toggle="modal" data-target="#modal-fromleft">
        <i class="fa fa-pencil mr-5" ></i> Edit Profile
        </button>
        <!-- END Actions -->
        </div>
        </div>
        </div>

        <!-- END User Info -->

        <!-- Main Content -->
        <!-- Projects -->
        <div class="content">
        <div class="block">
            
        <div class="block-content block-content">
        <table class="table table-borderless mt-40">    
                                <tbody>
                                <div class="block-header block-header-default">
                    <h3 class="block-title">Informsi Pribadi</h3>
                </div>                   
                <tr class="table-danger">
                                        <td class="font-w600">Nama :</td>
                                        <td>{{ Auth::user()->namasiswa }}</td>
                                    </tr>
                                    <tr class="table-danger">
                                        <td class="font-w600">NISN :</td>
                                        <td>{{ Auth::user()->nisn }}</td>
                                    </tr>
                                    <tr class="table-danger">
                                        <td class="font-w600">No. Hp :</td>
                                        <td>{{ Auth::user()->nohp }}</td>
                                    </tr>
                                    <tr class="table-danger">
                                        <td class="font-w600">Jenis Kelamin :</td>
                                        <td>{{ Auth::user()->jeniskelamin }}</td>
                                    </tr>
                                    <tr class="table-danger">
                                        <td class="font-w600">Alamat :</td>
                                        <td> {{ Auth::user()->alamat }}</td>
                                    </tr>
                                    <tr class="table-danger">
                                        <td class="font-w600">Agama :</td>
                                        <td>{{ Auth::user()->agama }}</td>
                                    </tr>
                                    <tr class="table-danger">
                                        <td class="font-w600">Jurusan :</td>
                                        <td> {{ Auth::user()->jurusan }}</td>
                                    </tr>
                                    <tr class="table-danger">
                                        <td class="font-w600">Kelas :</td>
                                        <td> {{ Auth::user()->kelas }}</td>
                                    </tr>
                                
                                
                                </tbody>
                            </table>
                            <!-- END Project Info -->
                        </div>
                        </div>
                        <div class="content">
                            <div class="block">
                            <div class="block-content block-content">
                                <table class="table table-borderless mt-40">
                                <tbody>
                                <div class="block-header block-header-default">
                    <h3 class="block-title">Informsi Akun</h3>
                </div>                   
                <tr class="table-success">
                <td class="font-w600">Email :</td>
                <td>{{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr class="table-success">
                                        <td class="font-w600">Password :</td>
                                        <td>**********</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                
                        <div class="modal fade" id="modal-fromleft" tabindex="-1" role="dialog" aria-labelledby="modal-fromleft" aria-hidden="true">
        <div class="modal-dialog modal-dialog-fromleft" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Ganti Profiile Akun</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <br>
                <div class="col-xl-10">
                <form action="/profilesiswa/{{Auth::user()->id}}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            {{ csrf_field() }}    
                                    <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="namasiswa">Nama Siswa</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('namasiswa') is-invalid @enderror" id="namasiswa" name="namasiswa" autocomplete="off" value="{{ Auth::user()->namasiswa }}" onfocus() >
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
                                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" autocomplete="off" value="{{ Auth::user()->nisn }}" disabled ><span class="text-danger">*Jika Salah Input NISN, Segera Lapor Ke Guru Piket</span>
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nohp">No Hp</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="nohp" name="nohp" autocomplete="off" value="{{ Auth::user()->nohp }}" onfocus() >
                                    </div>
                                    @error ('nohp')
                                    <div class="invalid-feedback">
                                {{$message}}
                </div>
                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="jeniskelamin">Jenis Kelamin </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="jeniskelamin" name="jeniskelamin" autocomplete="off">
                                        <option value="{{Auth::user()->jeniskelamin}}">{{Auth::user()->jeniskelamin}}</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="alamatortu">Alamat </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('alamatortu') is-invalid @enderror" id="alamatortu" name="alamatortu" autocomplete="off"  value="{{Auth::user()->alamat }}">
                                    </div>
                                    @error ('alamatortu')
                                    <div class="invalid-feedback">
                                {{$message}}
                </div>
                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="Jurusan">Jurusan  </label>
                                    <div class="col-lg-8">
                                        <select class="form-control" id="Jurusan" name="Jurusan" autocomplete="off" Disabled>
                                            <option value="">{{Auth::user()->jurusan }}</option>
                                </select>
                                <label class="" for="kelas"><span class="text-danger">*Jika Salah Input Jurusan, Segera Lapor Ke Guru Piket</span>
                            </div>
                        </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="kelas">Kelas  </label>
                                    <div class="col-lg-8">
                                        <select class="form-control" id="kelas" name="kelas" autocomplete="off" Disabled>
                                            <option value="">{{Auth::user()->kelas }}</option>
                                </select>
                                <label class="" for="kelas"><span class="text-danger">*Jika Salah Input Kelas, Segera Lapor Ke Guru Piket</span>
                            </div>
                        </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="email">email  </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('alamatortu') is-invalid @enderror" id="alamatortu" name="alamatortu" autocomplete="off" value="{{Auth::user()->email }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="foto">Foto Profile </label>
                                    <div class="col-lg-8">
                                        <input type="file" class="form-control" id="foto" name="foto"><span class="text-danger">*Maks 2MB</span>
                                    </div>
                                </div>
                                    </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                            <button type="submit" class="btn btn-alt-primary">Update!</button>
                                    </div>
                                </div>
                            </form>
                        </div>


        @endsection