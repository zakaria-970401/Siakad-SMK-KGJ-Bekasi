@extends ('layout.mastersiswa')

@section('judul', 'Nilai Data Siswa')

@section('konten')
<!-- Main Container -->

<!-- Dynamic Table Full -->
<div class="content">
    <div class="block">
       <div class="block-header block-header-default">
            <h1 class="block-title"><strong>DATA NILAI SISWA </h1></strong>
            <a href="#" class="btn btn-outline-danger mr-5 mb-15">
                            <i class="fa fa-file-pdf-o mr-5"></i>Export To PDF
                        </a>
                        <a href="/eksportdataguru" class="btn btn-outline-success mr-5 mb-15">
                            <i class="fa fa-file-excel-o mr-5"></i>Export To Excel
                        </a>
                </div>
            </div> 
     <div class="col-xl-8">
     <form action="#" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
        <div class="form-group row">
                <label class="col-4 mt-5" for="val-select2">Tahun Ajaran</span></label>
                <div class="col-4">
                    <select class="js-select2 form-control" id="kategori_tahunajaran" name="kategori_tahunajaran" style="width: 100%;">
                        <option> Pilih Tahun Ajaran</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                          @if($rombel==1) 
                        <option value="2018/2019">2018/2019</option>
                          @elseif($rombel==2) 
                        <option value="2018/2019">2018/2019</option>
                        <option value="2019/2020">2019/2020</option>
                        @elseif($rombel==3)
                        <option value="2018/2019">2018/2019</option>
                        <option value="2019/2020">2019/2020</option>
                        <option value="2020/2021">2020/2021</option>
                    @endif
                    </select>
                </div>
                <br>
                <br>
                    <div class="col-lg-8 ml-auto">
                        <button type="submit" class="btn btn-outline-dark mr-5 mb-5">
                            <i class="fa fa-search mr-5"></i>Cari
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <div class="block">
            <div class="content">
        <h5>Nama: {{$nama_siswa}}
        <br><br>
        Kelas: {{$kelas_siswa}} 
        </h5>
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead class="bg-info">
                <th class="text-center">NO</th>
                        <th class="text-center">Tahun Ajaran</th>
                        <th class="text-center">Semester</th>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Mapel</th>
                        <th class="text-center">HARIAN</th>
                        <th class="text-center">TUGAS</th>
                        <th class="text-center">PRAKTEK</th>
                        <th class="text-center">UTS</th>
                        <th class="text-center">UAS</th>
                </thead>
                <tbody>
                @foreach($nilai as $nl`)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">{{$nl`->tahunajaran}}</a></td>
                        <td class="text-center">{{$nl`->id_semester}}</td>
                        <td class="text-center">{{$nl`->namasiswa}}</td>
                        <td class="text-center">{{$nl`->kelas}}</td>
                        <td class="text-center">{{$nl`->mapel}}</td>
                        <td class="text-center">{{$nl`->nilai_harian}}</td>
                        <td class="text-center">{{$nl`->nilai_tugas}}</td>
                        <td class="text-center">{{$nl`->nilai_praktek}}</td>
                        <td class="text-center">{{$nl`->nilai_uts}}</td>
                        <td class="text-center">{{$nl`->nilai_uas}}</td>
                    </div>
                </tr>           
            @endforeach                    
            </tbody>
        </table>
        </div>
     </div>
  </div>




@endsection