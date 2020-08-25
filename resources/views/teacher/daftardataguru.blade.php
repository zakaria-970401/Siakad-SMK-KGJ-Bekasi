@extends ('layout.masterguru')

@section('judul', 'Daftar Data Guru')

@section('konten')
<!-- Main Container -->

<!-- Dynamic Table Full -->
<div class="content">
<div class="block">
<div class="block-header block-header-default">
    <h1 class="block-title"><strong>DATA GURU SMK KARYA GUNA JAYA</h1></strong>
    <a href="/guru/pdfdataguru" class="btn btn-outline-danger mr-5 mb-15">
                    <i class="fa fa-file-pdf-o mr-5"></i>Export To PDF
                </a>
                <a href="/guru/eksportdataguru" class="btn btn-outline-success mr-5 mb-15">
                    <i class="fa fa-file-excel-o mr-5"></i>Export To Excel
                </a>
        </div>
        <div class="col-xl-6">
        <form action="/guru/daftardataguru" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
         <div class="form-group row">
                <label class="col-2 mt-5" for="val-select2">Cari Guru</span></label>
                <div class="col-6">
                    <select class="js-select2 form-control" id="gurumapel" name="gurumapel" style="width: 100%;" data-placeholder="Cari Sesuai Guru Mapel..">
                    @foreach($mapel as $mpl)
                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        <option value="{{$mpl->namamapel}}">{{$mpl->namamapel}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-lg-4 ml-auto">
                        <button type="submit" class="btn btn-outline-dark mr-5 mb-5">
                            <i class="fa fa-search mr-5"></i>Cari
                        </button>
                    </div>
                 </form> 
            </div>
        </div>
        <div class="block-content block-content-full">
          <table class="table table-bordered table-striped table-vcenter  js-dataTable-full">
            <thead class="bg-success">
                        <th class="text-center">NO</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">NUPTK</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Mapel</th>
                        <th class="text-center">Kota Kelahiran</th>
                        <th class="text-center">No. Hp</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center" style="width: 20%;">AKSI</th>
                </thead>
                <tbody>
                @foreach($guru as $aa)
                    <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">{{$aa->namaguru}}</a></td>
                        <td class="text-center">{{$aa->nuptk}}</td>
                        <td class="text-center">{{$aa->jabatan}}</td>
                        <td class="text-center">{{$aa->mapel}}</td>
                        <td class="text-center">{{$aa->Kotakelahiran}}</td>
                        <td class="text-center">{{$aa->nohp}}</td>
                        <td class="text-center">{{$aa->alamat}}</td>
                        <td class="text-center"><img src="{{ asset('fotoguru/'.$aa->foto)}}" style = "height: 80px; width: 80px;" alt=""></td>
                        <td class="text-center">
                        <a href="/guru/detaildataguru/{{$aa->id}}" class="btn btn-sm btn-primary mb-5"><i class="si si-eye mr-5"></i>Detail</a>
                    </div>
                </tr>           
            @endforeach                    
            </tbody>
        </table>
        </div>



@endsection