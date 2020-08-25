@extends ('layout.masteradmin')

@section('judul', 'Naik Kelas')


@section('konten')
<!-- Main Container -->

    <div class="content">
    <!-- Bootstrap Design -->
        <div class="row">
            <div class="col-md-6">
    <!-- Default Elements -->
             <div class="block">
                 <div class="block-header block-header-default">
                    <h3 class="block-title">Form Naik Kelas</h3>
            </div>

              <div class="block-content">
                <form action="/editdatakelas" method="post">
            {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="id_jurusan">Kelas : </label>
                        <div class="col-lg-6">
                        <select class="form-control" id="kelas" name="kelas">
                        @foreach($kelas as $kls)
                        <option value="{{$kls->kelas}}">{{$kls->kelas}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
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



