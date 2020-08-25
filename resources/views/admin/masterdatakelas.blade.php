@extends ('layout.masteradmin')

@section('judul', 'Master Data Kelas')

@section('konten')



 <!-- Bordered Table -->
 <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Master Data Kelas</h3>
                            <a href="/pdfdatakelas" class="btn btn-outline-danger mr-5 mb-15">
                                <i class="fa fa-file-pdf-o mr-5"></i>Export To PDF
                            </a>
                            <a href="/eksportdatakelas" class="btn btn-outline-success mr-5 mb-15">
                                <i class="fa fa-file-excel-o mr-5"></i>Export To Excel
                            </a>
                            </div>
                            <div class="col-2 col-xl-2">
<br>
        <button type="button" class="btn btn-info mr-5 mb-15 center-block" data-toggle="modal" data-target="#modal-popout">
                        <i class="fa fa-plus mr-5"></i>Tambah Data Kelas
                    </button>
                    </div> 
                        <div class="block-content">
                            <table class="table table-bordered table-vcenter">
                            <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" style="width: 50px;">NO.</th>
                                        <th class="text-center">JURUSAN</th>
                                        <th class="text-center">KELAS</th>
                                        <th class="text-center">AKSI</th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($kelas as $kls)
                                    <tr>
                                        <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                        <td class="text-center">{{$kls->jurusan}}</td>
                                        <td class="text-center">{{$kls->kelas}}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="/editdatakelas/{{$kls->id}}/edit" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit" >
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                </div>

                                                <form action="/hapuskelas/{{$kls->id}}" method="post" class="d-inline">
                                                @method('delete')
                                  @csrf
                                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                        @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal fade" id="modal-popout" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Tambah Data Kelas</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <br>
                                <div class="col-xl-10">
                                    <form class="js-validation-bootstrap" action="/insertkelas" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="id_jurusan">Jurusan </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="id_jurusan" name="id_jurusan">
                                                    <option value="1">TKJ</option>
                                                    <option value="2">TKR</option>
                                        </select>
                                    </div>
                                </div>

                                    <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="kelas">Nama Kelas </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" autocomplete="off" value="{{old('kelas')}}">
                                            @error ('kelas')
                                            <div class="invalid-feedback">
                                     {{$message}}
                        </div>
                          @enderror
                          <br>
                          <div class="form-group row">
                            <div class="col-lg-8">
                                    <button type="submit" class="btn btn-hero btn-rounded btn-noborder btn-success mr-5 mb-5">Simpan!</button>
                                            </div>
                                    </form>
                                </div>

                                

@endsection
