<?php

namespace App\Http\Controllers\AuthTeacher;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
                $this->middleware('guest');
    }

    public function formregister() {

         return view ('authguru.register');
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
            'namaguru' => ['required', 'string'],
            'nuptk' => ['required', 'string', 'max:7', 'unique:teachers'],
            'jeniskelamin' => ['required'],
            'agama' => ['required'],
            'alamat' => ['required', 'string', 'max:255' ],
            'pendidikan' => ['required'],
            'nohp' => ['required', 'numeric'],
            'email' => ['required', 'string', 'unique:teachers'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return Teacher::create([
            'namaguru' => $data['namaguru'],    
            'nuptk' => $data['nuptk'],
            'jeniskelamin' => $data['jeniskelamin'],
            'agama' => $data['agama'],
            'alamat' => $data['alamat'],
            'pendidikan' => $data['pendidikan'],
            'nohp' => $data['nohp'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
