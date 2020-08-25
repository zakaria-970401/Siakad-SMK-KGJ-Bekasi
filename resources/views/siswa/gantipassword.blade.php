@extends ('layout.mastersiswa')

@section('judul', 'Ganti Password Siswa')


@section('konten')

 <!-- Main Container -->
 <div class="content">
                    <!-- Bootstrap Forms Validation -->
            <h2 class="content-heading">Ganti Password Akun</h2>
             <div class="block">           
                <div class="block-content">
                    <div class="col-xl-6">
                      <form class="js-validation-bootstrap" action="/gantipassword/{{ Auth::user()->id }}" method="post">
                      @method('patch')
                      {{ csrf_field() }}
                          <div class="form-group row">
                          <label class="col-lg-4 col-form-label" for="password">Password Baru: </label>
                             <div class="col-lg-8">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password Baru ..."><span class="text-danger">*Wajib 6 Digit</span>
                        </div>
                    </div>
                     
                          <div class="form-group row">
                          <label class="col-lg-4 col-form-label" for="password">Konfirmasi Password: </label>
                             <div class="col-lg-8">
                                <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Konfirmasi Password Baru ...">
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



