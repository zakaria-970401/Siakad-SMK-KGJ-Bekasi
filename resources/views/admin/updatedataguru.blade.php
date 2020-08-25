@extends ('layout.masteradmin')

@section('judul', 'Update Data Guru')


@section('konten')
<!-- Main Container -->
<div class="content">
    <a href="/masterdataguru" class="btn btn-rounded btn-hero btn-sm btn-info mb-5"><i class="si si-action-undo" ></i> Back</a>
        <div class="row">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header block-header-default">
                    <h3 class="block-title"><center><strong>Informasi Guru</h3></strong>
</div>

                    <div class="col justify-content-center py-20">
                        <div class="col-xl-8">
                            <form action="/postupdatedataguru/{{$guru->id}}" method="post">
                            @method('patch')
                        {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="namaguru">Nama Lengkap</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="namaguru" name="namaguru"  value="{{$guru->namaguru}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nuptk">NUPTK</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="nuptk" name="nuptk" value="{{$guru->nuptk}}">
                                <span class="text-danger">*Pasttikan 7 digit</span>
                            </div>
                        </div>

            <div class="form-group row">
                     <label class="col-lg-4 col-form-label" for="jeniskelamin">Jabatan</label>
                         <div class="col-lg-8">
                           <select class="form-control" id="jabatan" name="jabatan">
                           <option value="{{$guru->jabatan}}">{{$guru->jabatan}}</option>
                             @foreach ($jabatan as $a)
                          <option value="{{$a->namajabatan}}">{{$a->namajabatan}}</option>              
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="mapel">Mapel </label>
                  <div class="col-lg-8">
                    <select class="js-select2 form-control" id="mapel" name="mapel[]" style="width: 100%;" autocomplete="off" multiple>
                    <option value="{{$guru->mapel}}">{{$guru->mapel}}</option>
                    @foreach ($mapel as $jb)
                     <option value="{{$jb->namamapel}}">{{$jb->namamapel}}</option>
                    @endforeach
                </select>
            </div>
        </div>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="jeniskelamin">Jenis Kelamin</label>
                    <div class="col-lg-8">
                      <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                      <option value="{{$guru->jeniskelamin}}">{{$guru->jeniskelamin}}</option>
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="kotakelahiran">Kota Kelahiran </label>
                    <div class="col-lg-8">
                    <input type="text" class="form-control" id="Kotakelahiran" name="Kotakelahiran" value="{{$guru->Kotakelahiran}}">
                </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-4 col-form-label" for="tgllahir">Tanggal Lahir </label>
                <div class="col-lg-8">
                 <input type="text" class="js-datepicker form-control" id="tgllahir" name="tgllahir" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yy/mm/dd" placeholder="yy/mm/dd" value="{{$guru->tgllahir}}">
                </div>
            </div>

            <div class="form-group row">
               <label class="col-lg-4 col-form-label" for="agama">Agama</label>
                   <div class="col-lg-8">
                      <select class="form-control" id="agama" name="agama" >
                       <option value="{{$guru->agama}}">{{$guru->agama}}</option>
                        @foreach ($agama as $a)
                        <option value="{{$a->agama}}">{{$a->agama}}</option>
                         @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="kotakelahiran">Alamat </label>
                    <div class="col-lg-8">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{$guru->alamat}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="pendidikan">Pendidikan</label>
                    <div class="col-lg-8">
                      <select class="form-control" id="pendidikan" name="pendidikan">
                      <option value="{{$guru->pendidikan}}">{{$guru->pendidikan}}</option>
                      <option value="D2">D2</option>
                      <option value="D3">D3</option>
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                    </select>   
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="kotakelahiran">No. HP </label>
                    <div class="col-lg-8">
                    <input type="text" class="form-control" id="nohp" name="nohp" value="{{$guru->nohp}}">
                </div>
            </div>
                    
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn  btn-lg btn-alt-primary">Update!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        
    </div>

    <div class="col-md-6">
                            <!-- Normal Form -->
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title"><center><strong>Akun Guru</strong>
                                </div>
                                <div class="block-content">
                                    <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="email">Email</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="email" name="email" value="{{$guru->email}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="password">Password</label>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" id="password" name="password" value="{{$guru->password}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="confirm-password">Foto Profile</label>
                        <div class="col-lg-4">
				<a class="img-link"  data-toggle="modal" data-target="#modal-popin">
					<center><img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('fotoguru/'.$guru->foto)}}" style ="height: 220px; width: 250px; border-radius:50%; margin-right:15px;"  alt="" >
                    
		        	 </a>    
			       </div>
                </div>
        <br>

                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                            <button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-success mb-5" data-toggle="modal" data-target="#modal-fromleft">
				<i class="fa fa-pencil mr-5" ></i> Ganti Password
			</button>
                </div>
          </div>
          <div class="modal fade" id="modal-fromleft" tabindex="-1" role="dialog" aria-labelledby="modal-fromleft" aria-hidden="true">
            <div class="modal-dialog modal-dialog-fromleft" role="document">
            <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Ganti Password Guru</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <br>
                                <div class="col-xl-10">
                                    <form action="/updatepasswordguru/{{$guru->id}}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="email">E-mail</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="email" name="email" value="{{$guru->email}}"> <span class="text-danger">*Untuk Merubah E-mail, Masukan Password Akun</span>
                                            </div>
                                        </div>

                                <div class="form-group row">
                                 <label class="col-lg-4 col-form-label" for="password">Password</label>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" id="password" name="password" value="{{$guru->password}}">
                            </div>
                        </div>

                                <div class="form-group row">
                                 <label class="col-lg-4 col-form-label" for="password">Konfirmasi Password</label>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" Placeholder="Konfirmasi Password ..">
                            </div>
                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="foto">Foto Profile guru </label>
                                         <div class="col-lg-8">
                                           <input type="file" class="form-control" id="foto" name="foto">
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



