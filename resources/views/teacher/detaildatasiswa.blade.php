@extends ('layout.masterguru')

@section('judul', 'Detail Data Siswa')

@section('konten')
<div class="block">

<div class="bg-image bg-image-bottom" style="background-image: url('/assets/media/photos/photo13@2x.jpg');" >
	<div class="bg-primary-dark-op py-60">
		<div class="content content-full text-center">
			<!-- Avatar -->
			<div class="mb-15">
				<a class="img-link"  data-toggle="modal" href="#modal-fromleft">
					<img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('fotosiswa/'.$siswa->foto)}}" style ="height: 320px; width: 350px; border-radius:50%; margin-right:15px;"  alt="">
				</a>
                
			</div>
             
			<!-- END Avatar -->
			<!-- Personal -->
			<h1 class="h3 text-white font-w700 mb-10">{{ $siswa -> namasiswa }}</h1>
			    <h2 class="h5 text-white-op">{{ $siswa -> kelas }}<a class="text-primary-light"></h2>
            <table class="table table-striped table-dark">
                <div class="col-sm-2 col-xl-2">
                    <a href ="/guru/daftardatasiswa" class="btn btn-primary min-width-125 mb-25"><i class="si si-action-undo mr-5"></i>Kembali</a>
                 </div>   
            <br>
                <tbody>
                    <tr class="bg-info">
                    <td class="bg-dark">NAMA SISWA :</td>
                            <td class="bg-dark">{{$siswa -> namasiswa}}</td>
                        </tr>
                    <tr class="bg-info">
                    <td class="bg-dark">NISN :</td>
                            <td class="bg-dark">{{$siswa -> nisn}}</td>
                        </tr>
                    <td class="bg-dark">JURUSAN :</td>
                            <td class="bg-dark">{{$siswa -> jurusan}}</td>
                        </tr>
                    <td class="bg-dark">KELAS :</td>
                            <td class="bg-dark">{{$siswa -> kelas}}</td>
                        </tr>
                    <td class="bg-dark">KOTA KELAHIRAN :</td>
                            <td class="bg-dark">{{$siswa -> kotakelahiran}}</td>
                        </tr>
                    <td class="bg-dark">TANGGAL LAHIR :</td>
                            <td class="bg-dark">{{$siswa -> tgllahir}}</td>
                        </tr>
                    <td class="bg-dark">JENIS KELAMIN :</td>
                            <td class="bg-dark">{{$siswa -> jeniskelamin}}</td>
                        </tr>
                    <td class="bg-dark">AGAMA :</td>
                            <td class="bg-dark">{{$siswa -> agama}}</td>
                        </tr>
                    <td class="bg-dark">NAMA AYAH :</td>
                            <td class="bg-dark">{{$siswa -> namaayah}}</td>
                        </tr>
                    <td class="bg-dark">NAMA IBU :</td>
                            <td class="bg-dark">{{$siswa -> namaibu}}</td>
                        </tr>
                    <td class="bg-dark">ANAK KE :</td>
                            <td class="bg-dark">{{$siswa -> anakke}}</td>
                        </tr>
                    <td class="bg-dark">ALAMAT ORANG TUA :</td>
                            <td class="bg-dark">{{$siswa -> alamatortu}}</td>
                        </tr>
                    <td class="bg-dark">NO. TELPON WALI :</td>
                            <td class="bg-dark">{{$siswa -> no_teleponortu}}</td>
                        </tr>
                    <td class="bg-dark">PEKERJAAN AYAH :</td>
                            <td class="bg-dark">{{$siswa -> pekerjaanayah}}</td>
                        </tr>
                    <td class="bg-dark">PEKERJAAN IBU :</td>
                            <td class="bg-dark">{{$siswa -> pekerjaanibu}}</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
          
@endsection