@extends ('layout.masteradmin')

@section('judul', 'Detail Data Siswa')

@section('konten')
<div class="block">

<div class="bg-image bg-image-bottom" style="background-image: url('/assets/media/photos/photo13@2x.jpg');" >
	<div class="bg-primary-dark-op py-60">
		<div class="content content-full text-center">
			<!-- Avatar -->
			<div class="mb-15">
				<a class="img-link"  data-toggle="modal" href="#modal-fromleft">
					<img class="img-avatar img-avatar96 img-avatar-thumb" src=" style ="height: 320px; width: 350px; border-radius:50%; margin-right:15px;"  alt="">
				</a>
                
			</div>
             
			<!-- END Avatar -->
			<!-- Personal -->
			<h1 class="h3 text-white font-w700 mb-10">{{ $guru -> namaguru }}</h1>
            
			<h2 class="h5 text-white-op">
			{{ $guru -> jabatan }}<a class="text-primary-light"></h2>
			<!-- END Personal -->
            <a href="/getupdatedataguru/{{$guru->id}}" class="btn btn-rounded btn-hero btn-sm btn-alt-info mb-5">
				<i class="fa fa-pencil mr-5" ></i> Edit Data Guru
			</a>
            <table class="table table-striped table-dark">
                <div class="col-sm-2 col-xl-2">
                     <a href ="/masterdataguru" class="btn btn-primary min-width-125 mb-25"><i class="si si-action-undo mr-5"></i>Back</a>
                    </div>   
                 <br>
                    <tbody>
                        <tr class="bg-info">
                        <td class="bg-dark">NAMA LENKAP :</td></h4>
                                <td class="bg-dark">{{$guru -> namaguru}}</td>
                            </tr>
                        <tr class="bg-info">
                        <td class="bg-dark">NUPTK :</td>
                                <td class="bg-dark">{{$guru -> nuptk}}</td>
                            </tr>
                        <td class="bg-dark">JABATAN :</td>
                                <td class="bg-dark">{{$guru -> jabatan}}</td>
                            </tr>
                        <td class="bg-dark">MATA PELAJARAN :</td>
                                <td class="bg-dark">{{$guru -> mapel}}</td>
                            </tr>
                        <td class="bg-dark">JENIS KELAMIN :</td>
                                <td class="bg-dark">{{$guru -> jeniskelamin}}</td>
                            </tr>
                        <td class="bg-dark">KOTA KELAHIRAN :</td>
                                <td class="bg-dark">{{$guru -> Kotakelahiran}}</td>
                            </tr>
                        <td class="bg-dark">TANGGAL LAHIR :</td>
                                <td class="bg-dark">{{$guru -> tgllahir}}</td>
                            </tr>
                        <td class="bg-dark">AGAMA :</td>
                                <td class="bg-dark">{{$guru -> agama}}</td>
                            </tr>
                            </tr>
                        <td class="bg-dark">ALAMAT  :</td>
                                <td class="bg-dark">{{$guru -> alamat}}</td>
                            </tr>
                        <td class="bg-dark">PENDIDIKAN :</td>
                                <td class="bg-dark">{{$guru -> pendidikan}}</td>
                            </tr>
                        <td class="bg-dark">NO. Telp :</td>
                                <td class="bg-dark">{{$guru -> nohp}}</td>
                            </tr>
                        <td class="bg-dark">E-Mail Address :</td>
                                <td class="bg-dark">{{$guru -> email}}</td>
                            </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
        
                   
@endsection