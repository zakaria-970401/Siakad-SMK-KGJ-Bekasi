        @extends ('layout.masteradmin')

        @section('judul', 'Edit Data Kelas')


        @section('konten')
        <!-- Main Container -->

        <div class="content">
        <!-- Bootstrap Design -->
        <div class="row">
        <div class="col-md-6">
        <!-- Default Elements -->
        <div class="block">
        <div class="block-header block-header-default">
        <h3 class="block-title">Form Edit Kelas</h3>

        </div>
        <div class="block-content">
        <form action="/editdatakelas/{{$kelas->id}}" method="post">
        @method('patch')
        {{ csrf_field() }}
        <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="id_jurusan">Jurusan </label>
        <div class="col-lg-6">
        <select class="form-control" id="id_jurusan" name="id_jurusan" value="{{$kelas->id_jurusan}}">
        <option value="1">TKJ</option>
        <option value="2">TKR</option>
        </select>
        </div>
        </div>

        <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="kelas">Nama Kelas </label>
        <div class="col-lg-6">
        <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" autocomplete="off" value="{{$kelas->kelas}}">
        @error ('kelas')
        <div class="invalid-feedback">
        {{$message}}
        </div>
        @enderror

        <br>        
        <div class="form-group row">
        <div class="push">
        <a href="/masterdatakelas" class="btn btn-square btn-info mr-5 mb-5">
        <i class="si si-action-undo mr-5"></i>Kembali
        </a>
        <button type="submit" class="btn btn-square btn-success mr-5 mb-5"> <i class="fa fa-save mr-5"></i>Simpan!</button>
        </div>
        </div>
        </div>
        </form>

        </div>




        @endsection



