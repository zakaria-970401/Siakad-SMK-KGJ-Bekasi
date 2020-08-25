<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use alert;
use Auth;
use App\Absensi;
use Illuminate\Support\Facades\Hash;


class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function timeZone($location)
    {
        return date_default_timezone_set($location);
    }

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        
        // method untuk absensi //
        $this->timeZone('Asia/Jakarta');
        $namasiswa = Auth::user()->namasiswa;
        $nisn = Auth::user()->nisn;
        $kelas = Auth::user()->kelas;
        $tglabsen = date("Y-m-d");
        $diperiksaoleh = new Absensi();
        $absensi = DB::table('tbl_absensi')->get();
        $cek_absen  = Absensi::where(['nisn' => $nisn, 'tglabsen' => $tglabsen])
        ->get()->first();

        if(is_null($cek_absen)) {
            $info = array(
                "status"    => "$namasiswa,"." ". "Kamu Belum Melakukan Absensi",
                "keterangan" => "",
                "BtnIzin" => "",
                "BtnSakit" => "",
                "BtnIn"     => "",
                "BtnOut"    => "disabled");
        }  

        elseif($cek_absen->izin == 1) {
            $info = array(
                "status"    => "Surat Izin Kamu Di Konfirmasi Guru Piket Dulu Yaa,". " "."$namasiswa",
                "BtnIn"     => "disabled",
                "BtnSakit"     => "disabled",
                "BtnIzin"     => "disabled",
                "keterangan" => "disabled",
                "BtnOut"    => "disabled");
            }
   
        elseif($cek_absen->sakit == 1) {
            $info = array(
                "status"    => "Surat Sakit Kamu Di Konfirmasi Guru Piket Dulu Yaa,". " "."$namasiswa",
                "BtnIn"     => "disabled",
                "BtnSakit"     => "disabled",
                "BtnIzin"     => "disabled",
                "keterangan" => "disabled",
                "BtnOut"    => "disabled");
            }
            
            elseif($cek_absen->status_absen == 0) {
                $info = array(
                    "status"    => "Absen Kamu Di Konfirmasi Guru Piket Dulu Yaa,". " "."$namasiswa",
                    "BtnIn"     => "disabled",
                    "BtnSakit"     => "disabled",
                    "BtnIzin"     => "disabled",
                    "keterangan" => "disabled",
                    "BtnOut"    => "disabled");
                }

            elseif($cek_absen->status_absen == 2) {
                $info = array(
                    "status"    => "Absen Kamu Di Tolak, Harap Temui Guru Piket Yang Cek Absen Yaa". " "."$namasiswa",
                    "BtnIn"     => "disabled",
                    "BtnSakit"     => "disabled",
                    "BtnIzin"     => "disabled",
                    "keterangan" => "disabled",
                    "BtnOut"    => "disabled");
                }

        elseif($cek_absen->jam_keluar == NULL) {
            $info = array(
                "status"    => "Jangan Lupa Absen Keluar Yaa,". " "."$namasiswa",
                "BtnIn"     => "disabled",
                "BtnSakit"     => "disabled",
                "BtnIzin"     => "disabled",
                "keterangan" => "readonly",
                "BtnOut"    => "");
            }
            
        else{
                $info = array(
                    "status"    => "$namasiswa". ",". " "."". "Absensi Kamu hari ini Telah selesai !",
                    "BtnIn"     => "disabled",
                    "keterangan"     => "disabled",
                    "BtnIzin"     => "disabled",
                    "BtnSakit"     => "disabled",
                    "BtnOut"    => "disabled");
            }
        
        $data_absen = Absensi::where('nisn', $nisn)->OrderBy('tglabsen', 'desc')->paginate(3);
        $informasi = DB::table('tbl_informasi')->where('untuk', '=', 'siswa')->orderBy('tgl_terbit', 'asc')->paginate(3);         
       
        return view('siswa.index', compact ('informasi','data_absen','cek_absen', 'info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profilesiswa()
    {
            $siswa = DB::table('users')->join('tbl_datasiswa', 'users.nisn', '=', 'tbl_datasiswa.nisn')->select('users.nisn' , 'tbl_datasiswa.kotakelahiran', 'tbl_datasiswa.namaayah', 'tbl_datasiswa.anakke', 'tbl_datasiswa.pekerjaanayah', 'tbl_datasiswa.pekerjaanibu')->first();

        return view('siswa.profile', compact ('siswa'));
    }

    public function detailabsenku($id)
    {
        $absen = Absensi::find($id);

        return view('siswa.detailabsen', compact ('absen'));
    }

    public function getinputabsen()
    {
        $this->timeZone('Asia/Jakarta');
        $namasiswa = Auth::user()->namasiswa;
        $nisn = Auth::user()->nisn;
        $kelas = Auth::user()->kelas;
        $tglabsen = date("Y-m-d");
        $diperiksaoleh = new Absensi();
        $absensi = DB::table('tbl_absensi')->get();
        $cek_absen  = Absensi::where(['nisn' => $nisn, 'tglabsen' => $tglabsen])
        ->get()->first();

        if(is_null($cek_absen)) {
            $info = array(
                "status"    => "$namasiswa,"." ". "Kamu Belum Melakukan Absensi",
                "keterangan" => "",
                "BtnIzin" => "",
                "BtnSakit" => "",
                "BtnIn"     => "",
                "BtnOut"    => "disabled");
        }  

        elseif($cek_absen->izin == 1) {
            $info = array(
                "status"    => "Surat Izin Kamu Di Konfirmasi Guru Piket Dulu Yaa,". " "."$namasiswa",
                "BtnIn"     => "disabled",
                "BtnSakit"     => "disabled",
                "BtnIzin"     => "disabled",
                "keterangan" => "disabled",
                "BtnOut"    => "disabled");
            }
   
        elseif($cek_absen->sakit == 1) {
            $info = array(
                "status"    => "Surat Sakit Kamu Di Konfirmasi Guru Piket Dulu Yaa,". " "."$namasiswa",
                "BtnIn"     => "disabled",
                "BtnSakit"     => "disabled",
                "BtnIzin"     => "disabled",
                "keterangan" => "disabled",
                "BtnOut"    => "disabled");
            }
            
            elseif($cek_absen->status_absen == 0) {
                $info = array(
                    "status"    => "Absen Kamu Di Konfirmasi Guru Piket Dulu Yaa,". " "."$namasiswa",
                    "BtnIn"     => "disabled",
                    "BtnSakit"     => "disabled",
                    "BtnIzin"     => "disabled",
                    "keterangan" => "disabled",
                    "BtnOut"    => "disabled");
                }

            elseif($cek_absen->status_absen == 2) {
                $info = array(
                    "status"    => "Absen Kamu Di Tolak, Harap Temui Guru Piket Yang Cek Absen Yaa". " "."$namasiswa",
                    "BtnIn"     => "disabled",
                    "BtnSakit"     => "disabled",
                    "BtnIzin"     => "disabled",
                    "keterangan" => "disabled",
                    "BtnOut"    => "disabled");
                }

        elseif($cek_absen->jam_keluar == NULL) {
            $info = array(
                "status"    => "Jangan Lupa Absen Keluar Yaa,". " "."$namasiswa",
                "BtnIn"     => "disabled",
                "BtnSakit"     => "disabled",
                "BtnIzin"     => "disabled",
                "keterangan" => "readonly",
                "BtnOut"    => "");
            }
            
        else{
                $info = array(
                    "status"    => "$namasiswa". ",". " "."". "Absensi Kamu hari ini Telah selesai !",
                    "BtnIn"     => "disabled",
                    "keterangan"     => "disabled",
                    "BtnIzin"     => "disabled",
                    "BtnSakit"     => "disabled",
                    "BtnOut"    => "disabled");
            }
        
        $data_absen = Absensi::where('nisn', $nisn)->OrderBy('tglabsen', 'desc')->paginate(3);
        $informasi = DB::table('tbl_informasi')->where('untuk', '=', 'siswa')->orderBy('tgl_terbit', 'asc')->paginate(3);         
       
        return view('siswa.inputabsen', compact ('informasi','data_absen','cek_absen', 'info'));

    }

    public function create()
    {
        //
    }
    
    public function laporanabsen()
    {
        $nisn = Auth::user()->nisn;
        $namasiswa = Auth::user()->nisn;

        $absensiswa = DB::table('tbl_absensi')->where('nisn', '=', $nisn)->get();

        return view('siswa.laporanabsen', compact ('absensiswa'));
    }
    
    public function laporanabsenkategori(Request $request)
    {
        //dd($request->all());

        $nisn = Auth::user()->nisn;
        $namasiswa = Auth::user()->nisn;

        $kateori_tglabsen= $request->kategori_tglabsen;
        $absensiswa = DB::table('tbl_absensi')->where('tglabsen', '=', $kateori_tglabsen)->where('nisn', '=', $nisn)->get();

        return view('siswa.laporanabsen', compact ('absensiswa', 'categori_tglabsen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->timeZone('Asia/Jakarta');
        $namasiswa = \Auth::user()->namasiswa;
        $nisn = \Auth::user()->nisn;
        $kelas = \Auth::user()->kelas;
        $tglabsen = date("Y-m-d");
        $time= date("H:i:s");
        $keterangan = $request->keterangan; 
        $izin = true;
        $sakit=true;

        $absen = new Absensi();

        // BUTTON MASUK //
        if(isset($request->BtnIn)){
        //cek inputan ganda absen//
            $cek_double = $absen->where(['tglabsen' => $tglabsen, 'nisn' => $nisn])->count();
             if ($cek_double > 0) {
            return redirect()->back();
        }
            $absen->create([
                'namasiswa'=>$namasiswa,
                'nisn'=>$nisn,
                'kelas'=>$kelas,
                'tglabsen'=>$tglabsen,
                'jam_masuk'=>$time,
                'keterangan'=>$keterangan,
            ]);
            return redirect()->back()->with('success', 'Berhasil, Tunggu Konfirmasi Dari Guru Piket'); 
            }

        //******** BUTTON IZIN ************//
        elseif(isset($request->BtnIzin)){
            $cek_double = $absen->where(['tglabsen' => $tglabsen, 'nisn' => $nisn])->count();
            if ($cek_double > 0) {
           return redirect()->back();
           }
           $absen->create([
            'namasiswa'=>$namasiswa,
            'nisn'=>$nisn,
            'kelas'=>$kelas,
            'tglabsen'=>$tglabsen,
            'izin'=>$izin,
            'keterangan'=>$keterangan,
        ]);
       
         return redirect()->back()->with('success', 'Berhasil, Tunggu Konfirmasi Dari Guru Piket'); 
    
            }

        //******** BUTTON SAKIT ************//
        elseif(isset($request->BtnSakit)){
            $cek_double = $absen->where(['tglabsen' => $tglabsen, 'nisn' => $nisn])->count();
            if ($cek_double > 0) {
           return redirect()->back();
           }
           $absen->create([
            'namasiswa'=>$namasiswa,
            'nisn'=>$nisn,
            'kelas'=>$kelas,
            'tglabsen'=>$tglabsen,
            'sakit'=>$sakit,
            'keterangan'=>$keterangan,
        ]);

        return redirect()->back()->with('success', 'Berhasil, Tunggu Konfirmasi Dari Guru Piket'); 
    
            }


        elseif(isset($request->BtnOut)){
            $absen->where(['tglabsen'=>$tglabsen, 'nisn'=>$nisn])
                    ->update([
                        'jam_keluar'=>$time,
            ]);
            return redirect()->back()->with('success', 'Berhasil, Jangan Lupa Besok Absen Lagi Ya..'); 
            }
       
    }

    public function lihatnilai()
    {
        $nisn_siswa = \Auth::user()->nisn;
        $nama_siswa = \Auth::user()->namasiswa;
        $kelas_siswa = \Auth::user()->kelas;
        $rombel = \Auth::user()->rombel;


        $nilai = DB::table('tbl_nilai')->join('tbl_tahunajaran', 'tbl_nilai.id_tahunajaran', '=', 'tbl_tahunajaran.id_tahunajaran')->where('nisn', '=', $nisn_siswa)->get();
        
        return view ('siswa.lihatnilai', compact ('nilai', 'nama_siswa', 'kelas_siswa', 'tahun_ajaran', 'rombel'));
    }
    
    public function lihatnilaikategori(Request $request)
    {
        $nisn_siswa = \Auth::user()->nisn;
        $nama_siswa = \Auth::user()->namasiswa;
        $kelas_siswa = \Auth::user()->kelas;
        $rombel = \Auth::user()->rombel;


        $kategori_tahunajaran = $request->kategori_tahunajaran;
        
        $nilai = DB::table('tbl_nilai')->join('tbl_tahunajaran', 'tbl_nilai.id_tahunajaran', '=', 'tbl_tahunajaran.id_tahunajaran')->where('tahunajaran', '=', $kategori_tahunajaran)->where('nisn', '=', $nisn_siswa)->get();
        
        return view ('siswa.lihatnilai', compact ('nilai', 'nama_siswa', 'kelas_siswa', 'tahun_ajaran', 'rombel'));
    }

    public function lihatmading()
    {
        $informasi = DB::table('tbl_informasi')->where('untuk', '=', 'siswa')->orderBy('tgl_terbit', 'asc')->paginate(3);
        return view ('siswa.lihatmading', compact ('informasi'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $siswa = user::find($id);
        
        $siswa-> update($request->all());

      if ($request->has('foto')){
         $request->file('foto')->move('avasiswa/', $request->file('foto')->getClientOriginalName());
         $siswa->foto = $request->file('foto')->getClientOriginalName();
         $siswa->save();
      }     
        return redirect('/profilesiswa')->with('success', 'Data Berhasil Di Ubah!');
     
    }

    public function getupdatepassword()
    {

        return view ('siswa.gantipassword');
     
    }
    
    public function postupdatepassword(Request $request, $id)
    {
        $this->validate($request,[
            'password' => 'required | size:6 ',
            "konfirmasi_password" => "same:password",
        ]);
        $akun = User::find($id);
        
        $akun->fill([
            'password' => Hash::make($request->password)
            ])->save();

        return redirect('/profilesiswa')->with ('success', 'Data Berhasil Diubah!');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
