@extends ('layout.masterguru')


@section('judul', 'Halaman Edit Absen Siswa')


@section('konten')
    <div class="content">
        <div class="block">
            <div class="block-header bg-info">
                <h3 class="block-title">Form Edit Absensi Siswa </h3>
            </div>
                    <div class="content">
                      <form action="/guru/editabsensiswa/{{$absen->id}}" method="post" enctype="multipart/form-data">
                      @method('patch')
                        {{ csrf_field() }}
                         <div class="form-group row">
                           <label class="col-lg-2 col-form-label" for="val-username">TANGGAL ABSEN</label>
                             <div class="col-lg-4">
                                <input type="text" class="form-control" id="val-username" name="val-username" value="{{$absen->tglabsen}}" readonly>
                            </div>
                        </div>
                         <div class="form-group row">
                           <label class="col-lg-2 col-form-label" for="val-username">Nama Siswa</label>
                             <div class="col-lg-4">
                                <input type="text" class="form-control" id="val-username" name="val-username" value="{{$absen->namasiswa}}" readonly>
                            </div>
                        </div>
                         <div class="form-group row">
                           <label class="col-lg-2 col-form-label" for="val-username">Kelas</label>
                             <div class="col-lg-4">
                                <input type="text" class="form-control" id="val-username" name="val-username" value="{{$absen->kelas}}" readonly>
                            </div>
                        </div>
                      </div> 
                    </div> 
                       <div class="block">
                        <div class="content">
                        <div class="form-group row">
                          <label class="col-lg-2 col-form-label" for="alasanditolak">Catatan Absensi</label>
                            <div class="col-lg-4">
                                <textarea class="form-control" id="alasanditolak" name="alasanditolak" readonly>{{$absen->keterangan}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-lg-2" for="val-username">Status Absen Siswa</label>
                             <div class="col-lg-4">
                                @if($absen->status_absen==0)<span class="badge badge-warning"style="width:180px; height:50px"><H4>Sedang Diproses</H4></span>
                                 @elseif($absen->status_absen==1)<span class="badge badge-success" style="width:180px; height:50px"><h4>Diterima</h4></span>
                                  @else<span class="badge badge-danger" style="width:180px; height:50px"><H4>Di Tolak</H4></span>@endif
                            </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-2 col-form-label" for="alasanditolak">Alasan Ditolak</label>
                            <div class="col-lg-4">
                                <textarea class="form-control" id="alasanditolak" name="alasanditolak" required>{{$absen->alasanditolak}}</textarea>
                            <span class="text-danger">*isi Jika Menolak Absen Siswa</span>
                          </div>
                        </div>  
                         <div class="form-group row">
                           <label class="col-lg-2 col-form-label" for="diperiksaoleh">Di Periksa Oleh</label>
                             <div class="col-lg-4">
                                <input type="text" class="form-control" id="diperiksaoleh" name="diperiksaoleh" value="{{Auth::user()->namaguru}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="val-skill">Ganti Status Absen Siswa</label>
                            <div class="col-lg-3">
                                <select class="form-control" id="status_absen" name="status_absen">
                                <option value="1">Terima</option>
                                <option value="2">Tolak</option>
                                </select>   
                            </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-lg-10 ml-auto">
                                    <a href ="/guru/daftarabsen" class="btn btn-primary mb-25"><i class="si si-action-undo mr-5"></i>Kembali</a>
                                    <button type="submit" class="btn btn-success mb-25 mr-25"><i class="fa fa-save mr-5"></i>Simpan!</button>
                             </div>  
                      </form>
                    </div>
                 </div>
            </div>



@endsection