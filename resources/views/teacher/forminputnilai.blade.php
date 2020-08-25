@extends ('layout.masterguru')

@section('judul', 'Daftar Nilai Siswa ')

@section('konten')
<!-- Main Container -->

<!-- Dynamic Table Full -->
    <div class="content">
            <div class="js-filter" data-speed="200">
                <div class="p-10 bg-gray push">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="fa fa-fw fa-book mr-5"></i>KATEGORI NILAI :
                            </a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" class="btn btn-secondary" href="#" data-category-link="TUGAS">TUGAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-category-link="UTS">UTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-category-link="UAS">UAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-category-link="HARIAN">HARIAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-category-link="PRAKTEK">PRAKTEK</a>
                    </li>
                </ul>
            </div>
            <a href="/guru/inputnilaisiswa" class="btn btn-danger mr-5 mb-15">
                    <i class="si si-action-undo mr-5"></i>Kembali!</a>

            <div class="col">
                <div class="col-md-12 col-xl-12" data-category="TUGAS">
                    <div class="block-content block-content-full bg-body-light text-center">
                    <div class="block-header block-header-default">
                        <h1 class="block-title"><strong>NILAI TUGAS</h1></strong>
                    </div>
                      <div class="block-header block-header-default">
                        <label class="row-lg-2 col-form-label" for="val-select2">Tahun Ajaran</label>
                        <div class="col-lg-2">
                          <form action="/guru/inputnilaitugas" method="post">
                          {{ csrf_field() }}
                            <select class="form-control" id="semester" name="id_tahunajaran" >
                           @foreach($thn_ajaran as $thn)
                               <option value="{{$thn->id_tahunajaran}}">{{$thn->tahunajaran}}</option>                        
                            </select>
                    @endforeach
                        </div>
                        <label class="row-lg-2 col-form-label" for="val-select2">Semester</label>
                        <div class="col-lg-2">
                            <select class="form-control" id="semester" name="id_semester">
                            @foreach($thn_ajaran as $thn)
                               <option value="{{$thn->id_semester}}">{{$thn->id_semester}}</option>                        
                            </select>
                    @endforeach
                        </div>
                        <label class="row-lg-2 col-form-label" for="val-select2">Mata Pelajaran</label>
                        <div class="col-lg-4">
                            <select class="form-control" id="mapel" name="mapel" style="width: 100%;">
                            @foreach($matapelajaran as $mpl)
                                <option value="{{$mpl}}">{{$mpl}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <table class="table table-bordered table-vcenter">
                        <thead class="bg-primary">
                         <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nisn</th>
                            <th class="text-center">Nama Siswa</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Wali Kelas</th>
                            <th class="">Masukan Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($siswa as $sw)
                        <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <th class="text-center"><input type="hidden" name="nisn[]" id="nisn" value="{{$sw->nisn}}">{{$sw->nisn}}</th>
                        <th class="text-center"><input type="hidden" name="namasiswa[]" id="namasiswa" value="{{$sw->namasiswa}}">{{$sw->namasiswa}}</th>
                        <th class="text-center"><input type="hidden" name="kelas[]" id="kelas" value="{{$sw->kelas}}" readonly>{{$sw->kelas}}</th>
                        <th class="text-center">{{$sw->namaguru}}</th>
                        <td class=""><center><div class="form-group row">
                        <div class="col-6">
                          <input type="text" class="form-control" id="nilai_tugas" name="nilai_tugas[]" autocomplete="off" value="{{old('nilai_tugas')}}"></center>
                            </div>
                        </div>
                        </div>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>     
                <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                              <button type="reset" class="btn btn-lg btn-warning mr-5 mb-5">
                                <i class="si si-reload mr-5"></i>Reset!
                                </button>
                              <button type="submit" class="btn btn-lg btn-alt-success mr-5 mb-5">
                                <i class="fa fa-save mr-5"></i>Simpan!
                                </button>
                            </div>
                        </div>
                   </div>
                </form>
            </div>
        
        <div class="col-md-12 col-xl-12" data-category="UTS">
                    <div class="block-content block-content-full bg-body-light text-center">
                      <div class="block-content block-content-full bg-body-light text-center">
                    <div class="block-header block-header-default">
                        <h1 class="block-title"><strong>NILAI UTS</h1></strong>
                    </div>
                      <div class="block-header block-header-default">
                      <label class="row-lg-2 col-form-label" for="val-select2">Tahun Ajaran</label>
                        <div class="col-lg-2">
                          <form action="/guru/inputnilaiuts" method="post">
                          @method('PATCH')
                          {{ csrf_field() }}
                            <select class="form-control" id="semester" name="id_tahunajaran" >
                            @foreach($thn_ajaran as $thn)
                               <option value="{{$thn->id_tahunajaran}}">{{$thn->tahunajaran}}</option>                        
                            </select>
                    @endforeach
                        </div>
                        <label class="row-lg-2 col-form-label" for="val-select2">Semester</label>
                        <div class="col-lg-2">
                            <select class="form-control" id="id_semester" name="id_semester" >
                            @foreach($thn_ajaran as $thn)
                               <option value="{{$thn->id_semester}}">{{$thn->id_semester}}</option>                        
                            </select>
                    @endforeach
                        </div>
                    <label class="col-lg-2 col-form-label" for="val-select2">Mata Pelajaran</label>
                        <div class="col-lg-4">
                            <select class="form-control" id="mapel" name="mapel" style="width: 100%;" data-placeholder="Pilih Mata Pelajaran ..">
                            @foreach($matapelajaran as $mpl)
                                <option value="{{$mpl}}">{{$mpl}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <table class="table table-bordered table-vcenter">
                        <thead class="bg-info">
                         <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nisn</th>
                            <th class="text-center">Nama Siswa</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Wali Kelas</th>
                            <th class="">Masukan Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($siswa as $sw)
                        <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <th class="text-center"><input type="hidden" name="nisn[]" id="nisn" value="{{$sw->nisn}}" readonly>{{$sw->nisn}}</th>
                        <th class="text-center"><input type="hidden" name="namasiswa[]" id="namasiswa" value="{{$sw->namasiswa}}" readonly>{{$sw->namasiswa}}</th>
                        <th class="text-center"><input type="hidden" name="kelas[]" id="kelas" value="{{$sw->kelas}}" readonly>{{$sw->kelas}}</th>
                        <th class="text-center">{{$sw->namaguru}}</th>
                        <td class=""><center><div class="form-group row">
                        <div class="col-6">
                          <input type="text" class="form-control" id="nilai_uts[]" name="nilai_uts[]" autocomplete="off" value="{{old('nilai_uts')}}"></center>
                            </div>
                        </div>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>     
                <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                              <button type="reset" class="btn btn-lg btn-warning mr-5 mb-5">
                                <i class="si si-reload mr-5"></i>Reset!
                                </button>
                              <button type="submit" class="btn btn-lg btn-alt-success mr-5 mb-5">
                                <i class="fa fa-save mr-5"></i>Simpan!
                                </button>
                            </div>
                        </div>
                   </div>
                </form>
            </div>
        </div>
    
        <div class="col-md-12 col-xl-12" data-category="UAS">
                    <div class="block-content block-content-full bg-body-light text-center">
                      <div class="block-content block-content-full bg-body-light text-center">
                    <div class="block-header block-header-default">
                        <h1 class="block-title"><strong>NILAI UAS</h1></strong>
                    </div>
                      <div class="block-header block-header-default">
                      <label class="row-lg-2 col-form-label" for="val-select2">Tahun Ajaran</label>
                        <div class="col-lg-2">
                          <form action="/guru/inputnilaiuas" method="post">
                          @method('PATCH')
                          {{ csrf_field() }}
                            <select class="form-control" id="semester" name="id_tahunajaran" >
                            @foreach($thn_ajaran as $thn)
                               <option value="{{$thn->id_tahunajaran}}">{{$thn->tahunajaran}}</option>                        
                            </select>
                    @endforeach
                        </div>
                        <label class="row-lg-2 col-form-label" for="val-select2">Semester</label>
                        <div class="col-lg-2">
                            <select class="form-control" id="id_semester" name="id_semester" >
                            @foreach($thn_ajaran as $thn)
                               <option value="{{$thn->id_semester}}">{{$thn->id_semester}}</option>                        
                            </select>
                    @endforeach
                        </div>
                    <label class="col-lg-2 col-form-label" for="val-select2">Mata Pelajaran</label>
                        <div class="col-lg-4">
                            <select class="form-control" id="mapel" name="mapel" style="width: 100%;" data-placeholder="Pilih Mata Pelajaran ..">
                            @foreach($matapelajaran as $mpl)
                                <option value="{{$mpl}}">{{$mpl}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <table class="table table-bordered table-vcenter">
                        <thead class="bg-success">
                         <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nisn</th>
                            <th class="text-center">Nama Siswa</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Wali Kelas</th>
                            <th class="">Masukan Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($siswa as $sw)
                        <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <th class="text-center"><input type="hidden" name="nisn[]" id="nisn" value="{{$sw->nisn}}" readonly>{{$sw->nisn}}</th>
                        <th class="text-center"><input type="hidden" name="namasiswa[]" id="namasiswa" value="{{$sw->namasiswa}}" readonly>{{$sw->namasiswa}}</th>
                        <th class="text-center"><input type="hidden" name="kelas[]" id="kelas" value="{{$sw->kelas}}" readonly>{{$sw->kelas}}</th>  
                        <th class="text-center">{{$sw->namaguru}}</th>
                        <td class=""><center><div class="form-group row">
                        <div class="col-6">
                          <input type="text" class="form-control" id="nilai_uas[]" name="nilai_uas[]" autocomplete="off" value="{{old('nilai_uas')}}"></center>
                            </div>
                        </div>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>     
                <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                              <button type="reset" class="btn btn-lg btn-warning mr-5 mb-5">
                                <i class="si si-reload mr-5"></i>Reset!
                                </button>
                              <button type="submit" class="btn btn-lg btn-alt-success mr-5 mb-5">
                                <i class="fa fa-save mr-5"></i>Simpan!
                                </button>
                            </div>
                        </div>
                   </div>
                </form>
            </div>
        </div>
     
        <div class="col-md-12 col-xl-12" data-category="HARIAN">
                    <div class="block-content block-content-full bg-body-light text-center">
                      <div class="block-content block-content-full bg-body-light text-center">
                    <div class="block-header block-header-default">
                        <h1 class="block-title"><strong>NILAI HARIAN</h1></strong>
                    </div>
                      <div class="block-header block-header-default">
                      <label class="row-lg-2 col-form-label" for="val-select2">Tahun Ajaran</label>
                        <div class="col-lg-2">
                          <form action="/guru/inputnilaiharian" method="post">
                          @method('PATCH')
                          {{ csrf_field() }}
                            <select class="form-control" id="semester" name="id_tahunajaran" >
                            @foreach($thn_ajaran as $thn)
                               <option value="{{$thn->id_tahunajaran}}">{{$thn->tahunajaran}}</option>                        
                            </select>
                    @endforeach
                        </div>
                        <label class="row-lg-2 col-form-label" for="val-select2">Semester</label>
                        <div class="col-lg-2">
                            <select class="form-control" id="id_semester" name="id_semester" >
                            @foreach($thn_ajaran as $thn)
                               <option value="{{$thn->id_semester}}">{{$thn->id_semester}}</option>                        
                            </select>
                    @endforeach
                        </div>
                    <label class="col-lg-2 col-form-label" for="val-select2">Mata Pelajaran</label>
                        <div class="col-lg-4">
                            <select class="form-control" id="mapel" name="mapel" style="width: 100%;" data-placeholder="Pilih Mata Pelajaran ..">
                            @foreach($matapelajaran as $mpl)
                                <option value="{{$mpl}}">{{$mpl}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <table class="table table-bordered table-vcenter">
                        <thead class="bg-warning">
                         <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nisn</th>
                            <th class="text-center">Nama Siswa</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Wali Kelas</th>
                            <th class="">Masukan Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($siswa as $sw)
                        <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <th class="text-center"><input type="hidden" name="nisn[]" id="nisn" value="{{$sw->nisn}}" readonly>{{$sw->nisn}}</th>
                        <th class="text-center"><input type="hidden" name="namasiswa[]" id="namasiswa" value="{{$sw->namasiswa}}" readonly>{{$sw->namasiswa}}</th>
                        <th class="text-center"><input type="hidden" name="kelas[]" id="kelas" value="{{$sw->kelas}}" readonly>{{$sw->kelas}}</th>
                        <th class="text-center">{{$sw->namaguru}}</th>
                        <td class=""><center><div class="form-group row">
                        <div class="col-6">
                          <input type="text" class="form-control" id="nilai_harian[]" name="nilai_harian[]" autocomplete="off" value="{{old('nilai_harian')}}"></center>
                            </div>
                        </div>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>     
                <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                              <button type="reset" class="btn btn-lg btn-warning mr-5 mb-5">
                                <i class="si si-reload mr-5"></i>Reset!
                                </button>
                              <button type="submit" class="btn btn-lg btn-alt-success mr-5 mb-5">
                                <i class="fa fa-save mr-5"></i>Simpan!
                                </button>
                            </div>
                        </div>
                   </div>
                </form>
            </div>
        </div>
        <div class="col-md-12 col-xl-12" data-category="PRAKTEK">
                    <div class="block-content block-content-full bg-body-light text-center">
                      <div class="block-content block-content-full bg-body-light text-center">
                    <div class="block-header block-header-default">
                        <h1 class="block-title"><strong>NILAI PRAKTEK</h1></strong>
                    </div>
                      <div class="block-header block-header-default">
                      <label class="row-lg-2 col-form-label" for="val-select2">Tahun Ajaran</label>
                        <div class="col-lg-2">
                          <form action="/guru/inputnilaipraktek" method="post">
                          @method('PATCH')
                          {{ csrf_field() }}
                            <select class="form-control" id="semester" name="id_tahunajaran" >
                            @foreach($thn_ajaran as $thn)
                               <option value="{{$thn->id_tahunajaran}}">{{$thn->tahunajaran}}</option>                        
                            </select>
                    @endforeach
                        </div>
                        <label class="row-lg-2 col-form-label" for="val-select2">Semester</label>
                        <div class="col-lg-2">
                            <select class="form-control" id="id_semester" name="id_semester" >
                            @foreach($thn_ajaran as $thn)
                               <option value="{{$thn->id_semester}}">{{$thn->id_semester}}</option>                        
                            </select>
                    @endforeach
                        </div>
                    <label class="col-lg-2 col-form-label" for="val-select2">Mata Pelajaran</label>
                        <div class="col-lg-4">
                            <select class="form-control" id="mapel" name="mapel" style="width: 100%;" data-placeholder="Pilih Mata Pelajaran ..">
                            @foreach($matapelajaran as $mpl)
                                <option value="{{$mpl}}">{{$mpl}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <table class="table table-bordered table-vcenter">
                        <thead class="bg-danger">
                         <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nisn</th>
                            <th class="text-center">Nama Siswa</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Wali Kelas</th>
                            <th class="">Masukan Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($siswa as $sw)
                        <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <th class="text-center"><input type="hidden" name="nisn[]" id="nisn" value="{{$sw->nisn}}" readonly>{{$sw->nisn}}</th>
                        <th class="text-center"><input type="hidden" name="namasiswa[]" id="namasiswa" value="{{$sw->namasiswa}}" readonly>{{$sw->namasiswa}}</th>
                        <th class="text-center"><input type="hidden" name="kelas[]" id="kelas" value="{{$sw->kelas}}" readonly>{{$sw->kelas}}</th>
                        <th class="text-center">{{$sw->namaguru}}</th>
                        <td class=""><center><div class="form-group row">
                        <div class="col-6">
                          <input type="text" class="form-control" id="nilai_praktek[]" name="nilai_praktek[]" autocomplete="off" value="{{old('nilai_praktek')}}"></center>
                            </div>
                        </div>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>     
                <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                              <button type="reset" class="btn btn-lg btn-warning mr-5 mb-5">
                                <i class="si si-reload mr-5"></i>Reset!
                                </button>
                              <button type="submit" class="btn btn-lg btn-alt-success mr-5 mb-5">
                                <i class="fa fa-save mr-5"></i>Simpan!
                                </button>
                            </div>
                        </div>
                   </div>
                </form>
            </div>
        </div>

        


    <!--
            Codebase JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at /assets/_es6/main/app.js
        -->
        <script src="/assets/js/codebase.app.min.js"></script>
<script>jQuery(function () {
                Codebase.helpers('content-filter');
            });</script>

@endsection