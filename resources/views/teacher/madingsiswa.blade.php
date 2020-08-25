@extends ('layout.masterguru')

@section('judul', 'Mading Siswa')

@section('konten')
<!-- Main Container -->

<!-- Dynamic Table Full -->
<br>
           
            
 <div class="content">
    <div class="block">
      <div class="block-header block-header-default">
        <h3 class="block-title">DATA PENGUMUMAN SISWA</h3>
        </div>
        <div class="block-content block-content-full">
          <div class="col-2 col-xl-2">
            <button type="button" class="btn btn-primary mr-5 mb-15" data-toggle="modal" data-target="#modal-slideright">
               <i class="fa fa-plus mr-5"></i>Tambah Pengumuman
            </button>
            </div>
                <div class="block">
                    <div class="block-content block-content-full">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr class="bg-info">
                                        <th class="text-center">NO</th>
                                        <th class="text-center"  style="width: 5%;" >TANGGAL TERBIT</th>
                                        <th class="text-center"  style="width: 10%;">JUDUL PENGUMUMAN</th>
                                        <th class="text-center"  style="width: 55%;">ISI PENGUMUMAN</th>
                                        <th class="text-center"  style="width: 10%;">DIBUAT OLEH</th>
                                        <th class="text-center" style="width: 10%;" >AKSI</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @foreach ($pengumuman as $pengu)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$pengu->tgl_terbit}}</td>
                                    <td class="text-center">{{$pengu->judul}}</td>
                                    <td class="text-center">{{$pengu->isi}}</td>
                                    <td class="text-center">{{$pengu->dibuatoleh}}</td>
                                     <td class="text-center">        
                                            <a href="/guru/editinformasisiswa/{{$pengu->id}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit Pengumuman">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="/guru/hapusinformasisiswa/{{$pengu->id}}" method="post" class="d-inline">
                                                @method('delete')
                                  @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Pengumuman">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal fade" id="modal-slideright" tabindex="-1" role="dialog" aria-labelledby="modal-slideright" aria-hidden="true">
            <div class="modal-dialog modal-dialog-slideright" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">TAMBAH INFORMASI</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                                   <div class="content">
                                   <div class="block">
                                        <form action="/guru/postinformasi" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                            <div class="form-group row">
                                                <label class="col-12" for="untuk">Infromasi Untuk</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" id="untuk" name="untuk" value="Siswa" readonly>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                                <label class="col-12" for="judul">Judul Informasi</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Silahkan Isi Judul ..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12" for="isi">Isi Informasi</label>
                                                <div class="col-12">
                                                    <textarea class="form-control" id="isi" name="isi" rows="6" placeholder="Silahkan Isi Informasi.."></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-12" for="isi">Di Buat Oleh</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="dibuatoleh" name="dibuatoleh" rows="6"  value="{{ Auth::guard('teacher')->user()->namaguru }}" readonly >
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-alt-primary">Kirim!</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                           </div>
                      </div>
        @endsection