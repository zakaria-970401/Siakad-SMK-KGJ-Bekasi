@extends ('layout.masterguru')

@section('judul', 'Detail Data Guru')


@section('konten')
<!-- Main Container -->
<div class="content">
    <a href="/guru/daftardataguru" class="btn btn-rounded btn-hero btn-sm btn-info mb-5"><i class="si si-action-undo" ></i> Back</a>
        <div class="row">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header block-header-default">
                    <h3 class="block-title"><center><strong>Informasi Guru</h3></strong>
</div>

                    <div class="col justify-content-center py-20">
                        <div class="col-xl-8">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="namaguru">Nama Lengkap</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="namaguru" name="namaguru"  value="{{$guru->namaguru}}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nuptk">NUPTK</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="nuptk" name="nuptk" value="{{$guru->nuptk}}" readonly>
                                </div>
                            </div>

            <div class="form-group row">
                     <label class="col-lg-4 col-form-label" for="jeniskelamin">Jabatan</label>
                         <div class="col-lg-8">
                           <select class="form-control" id="jabatan" name="jabatan" raedonly>
                           <option value="{{$guru->jabatan}}">{{$guru->jabatan}}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="nuptk">Mapel Penguji</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="mapel" name="mapel" value="{{$guru->mapel}}" readonly>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="jeniskelamin">Jenis Kelamin</label>
                    <div class="col-lg-8">
                      <select class="form-control" id="jeniskelamin" name="jeniskelamin" readonly>
                      <option value="{{$guru->jeniskelamin}}">{{$guru->jeniskelamin}}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="kotakelahiran">Kota Kelahiran </label>
                    <div class="col-lg-8">
                    <input type="text" class="form-control" id="Kotakelahiran" name="Kotakelahiran" value="{{$guru->Kotakelahiran}}" readonly>
                </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-4 col-form-label" for="tgllahir">Tanggal Lahir </label>
                <div class="col-lg-8">
                 <input type="text" class="js-datepicker form-control" id="tgllahir" name="tgllahir" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yy/mm/dd" placeholder="yy/mm/dd" value="{{$guru->tgllahir}}" readonly>
                </div>
            </div>

            <div class="form-group row">
               <label class="col-lg-4 col-form-label" for="agama">Agama</label>
                   <div class="col-lg-8">
                      <select class="form-control" id="agama" name="agama" readonly>
                       <option value="{{$guru->agama}}">{{$guru->agama}}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="kotakelahiran">Alamat </label>
                    <div class="col-lg-8">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{$guru->alamat}}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="pendidikan">Pendidikan</label>
                    <div class="col-lg-8">
                      <select class="form-control" id="pendidikan" name="pendidikan" readonly>
                      <option value="{{$guru->pendidikan}}">{{$guru->pendidikan}}</option>
                    </select>   
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="kotakelahiran">No. HP </label>
                    <div class="col-lg-8">
                    <input type="text" class="form-control" id="nohp" name="nohp" value="{{$guru->nohp}}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
    <div class="col-md-6">
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
    </div>

@endsection



