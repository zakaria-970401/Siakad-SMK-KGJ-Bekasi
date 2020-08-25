@extends ('layout.masteradmin')

@section('judul', 'Update Akun Admin')


@section('konten')
<!-- Main Container -->
<div class="content">
    <a href="/gettambahakunadmin" class="btn btn-rounded btn-hero btn-sm btn-info mb-5">
                <i class="si si-action-undo" ></i> Back
            </a>
        <div class="row">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header block-header-default">
                    <h3 class="block-title"><center><strong>Informasi Admin</h3></strong>
                </div>
                    <div class="col justify-content-center py-20">
                        <div class="col-xl-8">
                            <form action="/updateakunadmin/{{$akun->id}}" method="post">
                            @method('patch')
                        {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nama">Nama</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="nama" name="nama"  value="{{$akun->nama}}">
                                </div>
                            </div>

                    <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="jeniskelamin">Jenis Kelamin</label>
                            <div class="col-lg-8">
                                <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                <option value="{{$akun->jeniskelamin}}">{{$akun->jeniskelamin}}</option>
                                @foreach ($jeniskelamin as $a)
                                <option value="{{$a->jeniskelamin}}">{{$a->jeniskelamin}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                    <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="agama">Agama</label>
                            <div class="col-lg-8">
                            <select class="form-control" id="agama" name="agama" >
                                <option value="{{$akun->agama}}">{{$akun->agama}}</option>
                                @foreach ($agama as $a)
                                <option value="{{$a->agama}}">{{$a->agama}}</option>
                                @endforeach
                                </select>
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
                                    <h3 class="block-title"><center><strong>Akun Admin</strong>
                                </div>
                                <div class="block-content">
                                    <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="email">Email</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="email" name="email" value="{{$akun->email}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="password">Password</label>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" id="password" name="password" value="{{$akun->password}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="confirm-password">Foto Profile</label>
                        <div class="col-lg-4">
				<a class="img-link"  data-toggle="modal" data-target="#modal-popin">
					<center><img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('fotoadmin/'.$akun->foto)}}" style ="height: 220px; width: 250px; border-radius:50%; margin-right:15px;"  alt="" >
                    
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
                            <h3 class="block-title">Ganti Password Admin</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <br>
                                <div class="col-xl-10">
                                    <form action="/updatepasswordadmin/{{$akun->id}}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="email">E-mail</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="email" name="email" value="{{$akun->email}}">
                                            </div>
                                        </div>

                                <div class="form-group row">
                                 <label class="col-lg-4 col-form-label" for="password">Password</label>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" id="password" name="password" value="{{$akun->password}}">
                            </div>
                        </div>

                                <div class="form-group row">
                                 <label class="col-lg-4 col-form-label" for="password">Konfirmasi Password</label>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" Placeholder="Konfirmasi Password ..">
                            </div>
                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="foto">Foto Profile Akun </label>
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



