@extends ('layout.masteradmin')

@section('judul', 'Edit Data Kelas')


@section('konten')
<div class="content">
<a href="/masterdatapengumuman" class="btn btn-square btn-info mr-5 mb-5">
        <i class="si si-action-undo mr-5"></i>Kembali
        </a>
        <br>
<div class="row">
                        <div class="col-md-6">
                            <!-- Default Elements -->
                            <div class="block">
                                <div class="block-header bg-primary">
                                    <h3 class="block-title"><center>Edit Pengumuman</h3></center>
                                    
                                </div>
                                <div class="block-content">
                                    <form action="/editmasterdatapengumuman/{{$informasi->id}}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                            <label class="col-12" for="tgl_terbit">Tanggal Terbit</label>
                                            <div class="col-md-9">
                                                <input type="text" class="js-datepicker form-control" id="tgl_terbit" name="tgl_terbit" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yy/mm/dd" placeholder="Silahkan Pilih Tanggal.." autocomplete="off" value="{{$informasi->tgl_terbit}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="untuk">Infromasi Untuk</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="untuk" name="untuk">
                                                <option value="{{$informasi->untuk}}">{{$informasi->untuk}} </option>
                                                <option value="siswa">SISWA</option>
                                                    <option value="guru">GURU</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="judul">Judul Informasi</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Silahkan Isi Judul .." value="{{$informasi->judul}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="isi">Isi Informasi</label>
                                            <div class="col-12">
                                                <textarea class="form-control" id="isi" name="isi" rows="6">{{$informasi->isi}}"</textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-12" for="isi">Di Buat Oleh</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="dibuatoleh" name="dibuatoleh" rows="6"  value="{{ Auth::guard('admin')->user()->nama }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                
                                                <button type="submit" class="btn btn-square btn-lg btn-alt-primary mr-5 mb-5">
                                       <i class="fa fa-save mr-5"></i>Simpan!</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                       
        @endsection