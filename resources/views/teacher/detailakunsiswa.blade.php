@extends ('layout.masterguru')

@section('judul', 'Detail Akun Siswa')


@section('konten')
<!-- Main Container -->
<div class="content">
    <a href="/guru/daftarakunsiswa" class="btn btn-rounded btn-hero btn-sm btn-info mb-5">
                <i class="si si-action-undo" ></i> Kemabali
            </a>
        <div class="row">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header bg-info">
                    <h3 class="block-title"><center><strong>Informasi Siswa</h3></strong>
                </div>
                    <div class="col justify-content-center py-20">
                        <div class="col-xl-8">
                           <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="namasiswa">Nama Siswa</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="namasiswa" name="namasiswa"  value="{{$akun->namasiswa}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nisn">NISN Siswa</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="nisn" name="nisn" value="{{$akun->nisn}}" readonly> 
                                </div>
                            </div>

                    <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="jeniskelamin">Jenis Kelamin</label>
                            <div class="col-lg-8">
                                <select class="form-control" id="jeniskelamin" name="jeniskelamin" readonly>
                                <option value="{{$akun->jeniskelamin}}">{{$akun->jeniskelamin}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nohp">No. HP</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="nohp" name="nohp"  value="{{$akun->nohp}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="alamat">Alamat Siswa</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="alamat" name="alamat"  value="{{$akun->alamat}}" readonly>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="agama">Agama</label>
                            <div class="col-lg-8">
                                <select class="form-control" id="agama" name="agama" style="width: 100%;" readonly>
                                <option value="{{$akun->agama}}">{{$akun->agama}}</option>
                            </select>
                        </div>
                    </div>


                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="jurusan">Jurusan</label>
                            <div class="col-lg-8">
                                <select class="form-control" id="jurusan" name="jurusan" readonly>
                                <option value="{{$akun->jurusan}}">{{$akun->jurusan}}</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kelas">Kelas</label>
                            <div class="col-lg-8">
                                <select class="form-control" id="kelas" name="kelas"  readonly>
                                <option value="{{$akun->kelas}}">{{$akun->kelas}} </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="col-md-6">
                            <!-- Normal Form -->
                            <div class="block">
                                <div class="block-header bg-warning">
                                    <h3 class="block-title"><center><strong>Akun Siswa</strong>
                                </div>
                                <div class="block-content">
                                    <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="email">Email</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="email" name="email" value="{{$akun->email}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="password">Password</label>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" id="password" name="password" value="{{$akun->password}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="confirm-password">Foto Profile</label>
                        <div class="col-lg-4">
				<a class="img-link"  data-toggle="modal" data-target="#modal-popin">
					<center><img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('avasiswa/'.$akun->foto)}}" style ="height: 220px; width: 250px; border-radius:50%; margin-right:15px;"  alt="" >
                    
		        	 </a>    
			       </div>
                </div>
             </div>
@endsection



