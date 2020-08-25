@extends ('layout.mastersiswa')

@section('judul', 'Halaman Utama Siswa')


@section('konten')

<div class="content">
      <div class="block">
        <div class="block-header bg-info">
            <h3 class="block-title">Form Input Absensi Siswa</h3>
      </div>
        <div class="block-content">
          <div class="col-xl-12">
             <form action="/postabsensiswa" method="post">
                 {{ csrf_field() }}
                 <div class="alert alert-dark alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading font-size-h4 font-w400">{{ $info['status'] }}</h3>
                    
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 mt-2" for="keterangan">Masukan Keterangan</label>
                     <div class="col-lg-6">
                      <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Keterangan Disini Ya {{ Auth::user()->namasiswa }}...." required {{$info['keterangan'] }}>
                     </div>
                    </div>
                <button type="submit" class="btn btn-primary mr-5 mb-5" name="BtnIn" value="Masuk" {{$info['BtnIn']}} >
                   <i class="fa fa-check mr-5"></i>ABSEN MASUK
                </button>
                <button type="submit" class="btn btn-warning mr-5 mb-5" name="BtnIzin" value="izin" {{$info['BtnIzin']}}>
                   <i class="fa fa-automobile mr-5"></i>ABSEN IZIN
                </button>
                <button type="submit" class="btn btn-danger mr-5 mb-5" name="BtnSakit" value="sakit" {{$info['BtnSakit']}}>
                   <i class="fa fa-ambulance mr-5"></i>ABSEN SAKIT
                </button>
                <button type="submit" class="btn btn-primary mr-5 mb-5" name="BtnOut" value="keluar" {{$info['BtnOut']}}>
                   <i class="fa fa-close mr-5"></i>ABSEN KELUAR
                </button>
            </form>
        </div>
     </div>
     <div class="content">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Riwayat Absensi {{ Auth::user()->namasiswa }}</h3>
            </div>
                <table class="table table-bordered table-vcenter">
                <thead class="thead-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Jam Masuk</th>
                            <th class="text-center">Jam Keluar</th>
                            <th class="text-center">Catatan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Di Periksa Oleh</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data_absen as $absen)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$absen->tglabsen}}</td>
                            <td class="text-center">{{$absen->jam_masuk}}</td>
                            <td class="text-center">{{$absen->jam_keluar}}</td>
                            <td class="text-center">{{$absen->keterangan}}</td>
                            <td class="text-center">
                            @if($absen->status_absen == 0)<span class="badge badge-warning"><strong>Proses</strong></span>
                            @elseif($absen->status_absen== 1)<span class="badge badge-success">Diterima</span>
                            @else<span class="badge badge-danger">Di Tolak</span>
                            @endif
                            </td>
                            <td class="text-center">{{$absen->diperiksaoleh}}</td>
                            <td class="text-center">
                            <a href="/detailabsenku/{{$absen->id}}" class="btn btn-sm btn-info inline"><i class="fa fa-eye mr-5"></i>Lihat</a>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
                {!! $data_absen->links() !!}
              </div>
            </div>          
        </div>
    </div>
            

@endsection



