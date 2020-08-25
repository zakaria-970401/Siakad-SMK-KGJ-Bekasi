<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'namasiswa' => ['required', 'string', 'max:255'],
            'nisn' => ['required', 'string', 'max:7', 'unique:users'],
            'jeniskelamin' => ['required', 'string'],
            'nohp' => ['required', 'max:11'],
            'alamat' => ['required', 'string',],
            'agama' => ['required', 'string'],
            'jurusan' => ['required', 'string'],
            'kelas' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'namasiswa' => $data['namasiswa'],
             'nisn' => $data['nisn'],
            'jeniskelamin' => $data['jeniskelamin'],
            'nohp' => $data['nohp'],
            'alamat' => $data['alamat'],
            'agama' => $data['agama'],
            'jurusan' => $data['jurusan'],
            'kelas' => $data['kelas'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status_akun'=>false,
        ]);
    }
}
