@extends('layouts.siswa')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="namasiswa" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="namasiswa" type="text" class="form-control @error('namasiswa') is-invalid @enderror" name="namasiswa" value="{{ old('namasiswa') }}" required autocomplete="namasiswa" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nisn" class="col-md-4 col-form-label text-md-right">{{ __('Nomer Induk Siswa') }}</label>

                            <div class="col-md-6">
                                <input id="nisn" type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}" required autocomplete="nisn" autofocus>

                                @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenisKelamin" class="col-md-4 col-form-label text-md-right">{{ __('JenisKelamin') }}</label>
                     
                            <div class="col-md-6">
                        <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                            <option value="">Pilih</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>        
                        </select>

                        @error('jeniskelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>

                <div class="form-group row">
                            <label for="nohp" class="col-md-4 col-form-label text-md-right">{{ __('Nomer Heandphone ') }}</label>

                            <div class="col-md-6">
                                <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ old('nohp') }}" required autocomplete="nohp" autofocus>

                                @error('nohp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                <div class="form-group row">
                            <label for="Alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                            
                            <div class="col-md-6">
                            <textarea class="form-control" rows="5" id="alamat" name="alamat"></textarea>
                            @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Agama" class="col-md-4 col-form-label text-md-right">{{ __('Agama') }}</label>
                     
                            <div class="col-md-6">
                        <select class="form-control" id="agama"name="agama">
                            <option value="">Pilih</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>        
                            <option value="Katolik">Katolik</option>        
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghucu</option>        
                        </select>

                        @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
                        <div class="form-group row">
                            <label for="jurusan" class="col-md-4 col-form-label text-md-right">{{ __('Jurusan') }}</label>
                     
                            <div class="col-md-6">
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="">Pilih</option>
                            <option value="TKJ">TKJ</option>
                            <option value="TKR">TKR</option>        
                        </select>

                        @error('jurusan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>

                <div class="form-group row">    
                 <label for="jurusan" class="col-md-4 col-form-label text-md-right">{{ __('Kelas') }}
                </label>
                <div class="col-md-6">
                    <select class="js-select2 form-control" id="kelas" name="kelas" >
                     <option value="">Pilih</option>
                        @foreach ($kelas as $k)
                            <option value="{{$k->kelas}}">{{$k->kelas}}</option>
                        @endforeach
                </select>
                        @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <br>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Daftar!') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
