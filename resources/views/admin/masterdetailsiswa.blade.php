@extends ('layout.masteradmin')

@section('judul', 'Detail Data Siswa')

@section('konten')
<div class="block">

<div class="bg-image bg-image-bottom" style="background-image: url('/assets/media/photos/photo13@2x.jpg');" >
	<div class="bg-primary-dark-op py-60">
		<div class="content content-full text-center">
			<!-- Avatar -->
			<div class="mb-15">
				<a class="img-link"  data-toggle="modal" href="#modal-fromleft">
					<img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('fotosiswa/'.$siswa->foto)}}" style ="height: 320px; width: 350px; border-radius:50%; margin-right:15px;"  alt="">
				</a>
                
			</div>
             
			<!-- END Avatar -->
			<!-- Personal -->
			<h1 class="h3 text-white font-w700 mb-10">{{ $siswa -> namasiswa }}</h1>
            
			<h2 class="h5 text-white-op">
			{{ $siswa -> kelas }}<a class="text-primary-light"></h2>
			<!-- END Personal -->
            <button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-success mb-5" data-toggle="modal" data-target="#modal-fromleft">
				<i class="fa fa-pencil mr-5" ></i> Edit Data Siswa
			</button>

                            <table class="table table-striped table-dark">
                            <div class="col-sm-2 col-xl-2">
            <a href ="/masterdatasiswa" class="btn btn-primary min-width-125 mb-25"><i class="si si-action-undo mr-5"></i>Back</a>
            </div>   
            <br>
                                <tbody>
                                    <tr class="bg-info">
                                    <td class="bg-dark">NAMA SISWA :</td>
                                         <td class="bg-dark">{{$siswa -> namasiswa}}</td>
                                        </tr>
                                    <tr class="bg-info">
                                    <td class="bg-dark">NISN :</td>
                                         <td class="bg-dark">{{$siswa -> nisn}}</td>
                                        </tr>
                                    <td class="bg-dark">JURUSAN :</td>
                                         <td class="bg-dark">{{$siswa -> jurusan}}</td>
                                        </tr>
                                    <td class="bg-dark">KELAS :</td>
                                         <td class="bg-dark">{{$siswa -> kelas}}</td>
                                        </tr>
                                    <td class="bg-dark">KOTA KELAHIRAN :</td>
                                         <td class="bg-dark">{{$siswa -> kotakelahiran}}</td>
                                        </tr>
                                    <td class="bg-dark">TANGGAL LAHIR :</td>
                                         <td class="bg-dark">{{$siswa -> tgllahir}}</td>
                                        </tr>
                                    <td class="bg-dark">JENIS KELAMIN :</td>
                                         <td class="bg-dark">{{$siswa -> jeniskelamin}}</td>
                                        </tr>
                                    <td class="bg-dark">AGAMA :</td>
                                         <td class="bg-dark">{{$siswa -> agama}}</td>
                                        </tr>
                                    <td class="bg-dark">NAMA AYAH :</td>
                                         <td class="bg-dark">{{$siswa -> namaayah}}</td>
                                        </tr>
                                    <td class="bg-dark">NAMA IBU :</td>
                                         <td class="bg-dark">{{$siswa -> namaibu}}</td>
                                        </tr>
                                    <td class="bg-dark">ANAK KE :</td>
                                         <td class="bg-dark">{{$siswa -> anakke}}</td>
                                        </tr>
                                    <td class="bg-dark">ALAMAT ORANG TUA :</td>
                                         <td class="bg-dark">{{$siswa -> alamatortu}}</td>
                                        </tr>
                                    <td class="bg-dark">NO. TELPON WALI :</td>
                                         <td class="bg-dark">{{$siswa -> no_teleponortu}}</td>
                                        </tr>
                                    <td class="bg-dark">PEKERJAAN AYAH :</td>
                                         <td class="bg-dark">{{$siswa -> pekerjaanayah}}</td>
                                        </tr>
                                    <td class="bg-dark">PEKERJAAN IBU :</td>
                                         <td class="bg-dark">{{$siswa -> pekerjaanibu}}</td>
                                        </tr>
                                 
                                </tbody>
                            </table>
	                    </div>
                    </div>
            <div class="modal fade" id="modal-fromleft" tabindex="-1" role="dialog" aria-labelledby="modal-fromleft" aria-hidden="true">
                <div class="modal-dialog modal-dialog-fromleft" role="document">
                  <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Edit Data Siswa</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <br>
                                <div class="col-xl-10">
                                    <form class="js-validation-bootstrap" action="/insertsiswa/{{$siswa->id}}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="namasiswa">Nama Siswa</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="namasiswa" name="namasiswa" value="{{$siswa->namasiswa}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nisn">NISN</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="nisn" name="nisn" value="{{$siswa->nisn}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="jurusan">Jurusan </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="jurusan" name="jurusan">
                                                <option value="{{$siswa->jurusan}}">{{$siswa->jurusan}}</option>
                                                    <option value="TKJ">TKJ</option>
                                                    <option value="TKR">TKR</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="kelas">Kelas</label>
                                            <div class="col-lg-8">
                                                <select class="js-select2 form-control" id="kelas" name="kelas" style="width: 100%;">
                                            <option value="{{$siswa->kelas}}">{{$siswa->kelas}}</option>
                                            @foreach ($kelas as $k)
                                                    <option value="{{$k->kelas}}">{{$k->kelas}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="kotakelahiran">Kota Kelahiran </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="kotakelahiran" name="kotakelahiran" value="{{$siswa->kotakelahiran}}">
                                            </div>
                                        </div>

                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tgllahir">Tanggal Lahir </label>
                                            <div class="col-lg-8">
                                            <input type="text" class="js-datepicker form-control" id="tgllahir" name="tgllahir" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yy/mm/dd" placeholder="yy/mm/dd" value="{{$siswa->tgllahir}}">
                                            </div>
                                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="jeniskelamin">Jenis Kelamin</label>
                            <div class="col-lg-6">
                                <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                <option value="{{$siswa->jeniskelamin}}">{{$siswa->jeniskelamin}}</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="agama">Agama</label>
                                            <div class="col-lg-8">
                                                <select class="js-select2 form-control" id="agama" name="agama" style="width: 100%;" value="{{$siswa->agama}}">
                                                @foreach ($agama as $a)
                                                    <option value="{{$a->agama}}">{{$a->agama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="namaayah">Nama Ayah </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="namaayah" name="namaayah" value="{{$siswa->namaayah}}">
                                            </div>
                                        </div>

                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="namaibu">Nama Ibu </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="namaibu" name="namaibu" value="{{$siswa->namaibu}}">
                                            </div>
                                        </div>

                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="anakke">Anak Ke </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="anakke" name="anakke" value="{{$siswa->anakke}}">
                                            </div>
                                        </div>

                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="alamatortu">alamatortu </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="alamatortu" name="alamatortu" value="{{$siswa->alamatortu}}">
                                            </div>
                                        </div>

                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="no_teleponortu">No. Telpon Wali </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="no_teleponortu" name="no_teleponortu" value="{{$siswa->no_teleponortu}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="pekerjaanayah">Pekerjaan Ayah </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="pekerjaanayah" name="pekerjaanayah" value="{{$siswa->pekerjaanayah}}">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="pekerjaanibu">Pekerjaan Ibu </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="pekerjaanibu" name="pekerjaanibu" value="{{$siswa->pekerjaanibu}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="foto">Foto Siswa </label>
                                            <div class="col-lg-8">
                                                <input type="file" class="form-control" id="foto" name="foto"> <span class="text-danger">*Maksimal 2MB</span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-alt-primary">Update!</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                  
                    <!-- Bootstrap Forms Validation -->

                   
                    <!-- END Material Forms Validation -->
 
















@endsection