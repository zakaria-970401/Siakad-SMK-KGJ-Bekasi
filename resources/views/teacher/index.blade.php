@extends ('layout.masterguru')

@section('judul', 'Halaman Utama Guru')


@section('konten')
<!-- Main Container -->

            <div class="content">
            
            <div class="row gutters-tiny invisible" data-toggle="appear">
                <!-- Row #1 -->
                <div class="col-6 col-xl-3">
                    <a class="block block-link-pop text-right bg-primary" href="/guru/daftardatasiswa">
                        <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                            <div class="float-left mt-10 d-none d-sm-block">
                                <i class="fa fa-graduation-cap fa-5x text-primary-light"></i>
                            </div>
                            <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="{{$datasiswa}}"></div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted"> DATA SISWA</div>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-xl-3">
                    <a class="block block-link-pop text-right bg-corporate" href="/guru/daftarakunsiswa">
                        <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                            <div class="float-left mt-10 d-none d-sm-block">
                                <i class="fa fa-users fa-5x text-body-bg-dark"></i>
                            </div>
                            <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="{{$dataakunsiswa}}"></div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">AKUN SISWA</div>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-xl-3">
                    <a class="block block-link-pop text-right bg-earth" href="/guru/daftardataguru">
                        <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                            <div class="float-left mt-10 d-none d-sm-block">
                                <i class="fa fa-tasks fa-5x text-body-bg-dark"></i>
                            </div>
                            <div class="font-size-h3 font-w600"><span data-toggle="countTo" data-speed="1" data-to="{{$dataakunguru}}">0</span></div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">AKUN GURU</div>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-xl-3">
                    <a class="block block-link-pop text-right bg-warning" href="/guru/daftardatakelas">
                        <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                            <div class="float-left mt-10 d-none d-sm-block">
                                <i class="fa fa-tasks fa-5x text-body-bg-dark"></i>
                            </div>
                            <div class="font-size-h3 font-w600"><span data-toggle="countTo" data-speed="1" data-to="{{$datakelas}}">0</span></div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">RUANGAN KELAS</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="content">
                <h2 class="content-heading">
                <i class="si si-note mr-5"></i> BUAT PENGUMUMAM 
            </h2>
            <div class="row">
                <div class="col-md-6">
                    <!-- Default Elements -->
                    <div class="block">
                        <div class="block-header block-header-default bg-info">
                            <h3 class="block-title">Silahkan Isi, Untuk Mengirim Informasi</h3>
                            
                        </div>
                        <div class="block-content">
                            <form action="/guru/postinformasi" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="form-group row">
                                    <label class="col-12" for="untuk">Infromasi Untuk</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="untuk" name="untuk" value="Siswa" readonly>
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
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-alt-primary">Kirim!</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                
                
@endsection



