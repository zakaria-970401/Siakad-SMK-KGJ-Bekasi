@extends ('layout.masteradmin')

@section('judul', 'Master Data Wali Kelas')

@section('konten')



<!-- Bordered Table -->
<div class="content">
    <div class="block">
                    <div class="block-header bg-light">
                        <h3 class="block-title"> Master Data Wali Kelas</h3>
                        <a href="#" class="btn btn-outline-danger mr-5 mb-15">
                            <i class="fa fa-file-pdf-o mr-5"></i>Export To PDF
                        </a>
                    <br>
                </div>
                <div class="col-2 col-xl-2">
                <div class="mr-2  d-inline">
                    <button type="button" class="btn btn-info mr-5 mb-15 center-block" data-toggle="modal" data-target="#modal-popout"><i class="fa fa-plus mr-5"></i>Tambah Data WaliKelas
                    </button>
                </div> 
            </div>
                <div class="block">
                    <table class="table table-bordered table-vcenter">
                        <thead class="bg-info">
                                <tr>
                                    <th class="text-center">NO.</th>
                                    <th class="text-center">NUPTK</th>
                                    <th class="text-center">Nama Guru</th>
                                    <th class="text-center">WALIKELAS</th>
                                </tr>
                            </thead>
                                    <tbody>
                                    @foreach ($guru as $walas)
                                    <tr>
                                    <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                    <td class="text-center">{{$walas->nuptk}}</td>
                                    <td class="text-center">{{$walas->namaguru}}</td>
                                    <td class="text-center">{{$walas->kelas}}</td>
                                    </tr>
                                    </td>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>

                <div class="modal fade" id="modal-popout" tabindex="-1" role="dialog" Saria-labelledby="modal-popout" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-dark">
        <h3 class="block-title">Tambah Data WaliKelas</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="si si-close"></i>
            </button>
        </div>
    </div>
    <br>
    <div class="col-xl-10">
        <form class="js-validation-bootstrap" action="/inputdatawalikelas" method="post"  enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="namaguru">Nama Guru </label>
            <div class="col-lg-8">
                <select class="js-select2 form-control" id="namaguru" name="namaguru" style="width: 100%;" data-placeholder="Pilih.."autocomplete="off" >
                <option value=""></option>
                @foreach ($namaguru as $nm )
                <option value="{{$nm->namaguru}}">{{$nm->namaguru}}</option>
            @endforeach
            </select>
        </div>
    </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="nuptk">NUPTK</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control @error('nuptk') is-invalid @enderror" id="nuptk" name="nuptk" autocomplete="off" value="{{old('nuptk')}}"><span class="text-danger">*Pasttikan 7 digit</span>
                @error ('nuptk')
                <div class="invalid-feedback">
            {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="kelas">Kelas </label>
            <div class="col-lg-8">
                <select class="js-select2 form-control" id="id_kelas" name="id_kelas" style="width: 100%;" autocomplete="off">
                <option value="">--Pilih--</option>
                @foreach ($kelas as $kls )
                <option value="{{$kls->id_kelas}}">{{$kls->kelas}}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
            <div class="col-lg-8 ml-auto">
                <button type="submit" class="btn btn-alt-primary">Simpan!</button>
            </div>
        </div>
    </form>
</div>


@endsection
