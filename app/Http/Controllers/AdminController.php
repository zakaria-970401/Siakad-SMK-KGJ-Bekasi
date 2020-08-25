<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ModelSiswa;
use App\ModelKelas;
use App\User;
use App\Admin;
use App\Teacher;
use App\Absensi;
use App\TahunAjaran;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request\hashFile;
use alert;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AkunSiswaImport;
use App\Exports\AkunSiswaExport;
use App\Exports\ExportDataSiswa;
use App\Exports\ExportDataKelas;
use App\Exports\AkunAdminExport;
use App\Exports\ExportDataGuru;
use App\Imports\ImportDataSiswa;
use App\Imports\ImportDataGuru;
use Auth;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth:admin');
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

    public function pdfdatasiswa()
    {
        $siswa = ModelSiswa::all();
        $pdf = pdf::loadView('pdf.pdfdatasiswa', compact ('siswa'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->download('Data Siswa KGJ'.date('Y-m-d').'.pdf');
    }
    
    public function pdfdataguru()
    {
        $guru = Teacher::all();
        $pdf = pdf::loadView('pdf.pdfdataguru', compact ('guru'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->download('Data Guru KGJ'.date('Y-m-d').'.pdf');
    }
    
    public function pdfdatakelas()
    {
        $kelas = DB::table('tbl_kelass')->join('tbl_jurusann', 'tbl_kelass.id_jurusan', '=', 'tbl_jurusann.id_jurusan')->get();
        $pdf = pdf::loadView('pdf.pdfdatakelas', compact ('kelas'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->download('Data Kelas'.date('Y-m-d').'.pdf');
    }


    public function pdfakunsiswa()
    {
        $akun = User::all();
        $pdf = pdf::loadView('pdf.pdfakunsiswa', compact ('akun'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->download('Data Akun Siswa Absensi-KGJ'.date('Y-m-d').'.pdf');
    }

    public function pdfakunadmin()
    {
        $akun = Admin::all();
        $pdf = pdf::loadView('pdf.pdfakunadmin', compact ('akun'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('Data Akun Amin Absensi-KGJ'.date('Y-m-d').'.pdf');
    }
    
    public function pdfpengumuman()
    {
        
        $informasi = DB::table('tbl_informasi')->get();
        $pdf = pdf::loadView('pdf.pdfpengumuman', compact ('informasi'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('Data Master Pengumuman Absensi-KGJ'.date('Y-m-d').'.pdf');
    }

    public function profileadmin(Request $id)
    {
        
        return view ('admin.profileadmin');
    }

    public function updateprofileadmin(Request $request, $id)
    {
        

        $admin = Admin::find($id);
         $admin-> update($request->all());
         if ($request->has('foto')){
            $request->file('foto')->move('fotoadmin/', $request->file('foto')->getClientOriginalName());
            $admin->foto = $request->file('foto')->getClientOriginalName();
            $admin->save();
         } 
                return redirect ('/profileadmin')->with ('success', 'Data Berhasil Diubah!');
    }

    public function index()
    {
        $datasiswa = DB::table('tbl_datasiswa')->count();
        $dataakunsiswa = DB::table('users')->count();
        $dataakunguru = DB::table('teachers')->count();
        $dataakunadmin = DB::table('admins')->count();
       
        return view ('admin.index', compact('datasiswa', 'dataakunsiswa', 'dataakunguru', 'dataakunadmin'));
    }

    public function postinformasi(Request $request)
    {
        $this->timeZone('Asia/Jakarta');  

        $this->validate($request,[
    		'judul' =>   'required', 
    		'isi' => 'required',
            ]);
           
        $tglterbit = date("Y-m-d");
        $namaadmin = Auth::user()->nama;
        $fotoadmin = Auth::user()->foto;

            DB::table('tbl_informasi')->insert([
                'tgl_terbit' => $tglterbit,
                'judul' => $request->judul,
                'untuk' => $request->untuk,
                'isi' => $request->isi,
                'dibuatoleh' => $namaadmin,
                'foto' => $fotoadmin,
                ]);
            
        return redirect ('/admin/index')->with ('success', 'Informasi Berhasil Dikirim!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $id)
    {
        $kelas = DB::table('tbl_kelass')->get();
        $siswa = DB::table('tbl_datasiswa')->get();
        $agama = DB::table('tbl_agama')->get();
        return view('admin.insertsiswa', compact ('siswa', 'kelas', 'agama'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             $this->validate($request,[
    		'namasiswa' => 'required',
    		'nisn' =>   'required | size:6 | unique:tbl_datasiswa', 
    		'jurusan' => 'required',
    		'kelas' => 'required',
    		'kotakelahiran' => 'required',
    		'tgllahir' => 'required',
    		'jeniskelamin' => 'required',
    		'agama' => 'required',
    		'namaayah' => 'required',
    		'namaibu' => 'required',
    		'anakke' => 'required | numeric',
    		'alamatortu' => 'required ',
    		'no_teleponortu' => 'required | numeric',
    		'pekerjaanayah' => 'required',
            'pekerjaanibu' => 'required',  
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048',
  		
        ]);
        
       $siswa = ModelSiswa::create([
            'namasiswa' => $request->namasiswa,
            'nisn' => $request->nisn,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'kotakelahiran' => $request->kotakelahiran,
            'tgllahir' => $request->tgllahir,
            'jeniskelamin' => $request->jeniskelamin,
            'agama' => $request->agama,
            'namaayah' => $request->namaayah,
            'namaibu' => $request->namaibu,
            'anakke' => $request->anakke,
            'alamatortu' => $request->alamatortu,
            'no_teleponortu' => $request->no_teleponortu,
            'pekerjaanayah' => $request->pekerjaanayah,
            'pekerjaanibu' => $request->pekerjaanibu,
            'foto' => $request->foto,
            
        ]);
        
        if ($request->has('foto')){
            $request->file('foto')->move('fotosiswa/', $request->file('foto')->getClientOriginalName());
            $siswa->foto = $request->file('foto')->getClientOriginalName();
            $siswa->save();

        }
 
        return redirect ('/insertsiswa')->with ('success', 'Data Siswa Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $siswa = DB::table('tbl_datasiswa')->find($id);
            $kelas = DB::table('tbl_kelass')->get();
            $agama = DB::table('tbl_agama')->get();
            
            return view ('admin.masterdetailsiswa', compact ('siswa', 'kelas', 'agama'));

        }
        
        public function masterdetailsiswa($id)
        {
                $siswa = DB::table('tbl_datasiswa')->find($id);
                $kelas = DB::table('tbl_kelass')->get();
                $agama = DB::table('tbl_agama')->get();
                return view('admin.masterdetailsiswa', compact('siswa', 'kelas', 'agama'));
    
            }

        public function masterdatasiswa(){

            $siswa = ModelSiswa::all();
            $kelas = DB::table('tbl_kelass')->get();
            $agama = DB::table('tbl_agama')->get();
            return view ('admin.masterdatasiswa', compact ('siswa', 'kelas', 'agama'));
        }
        
        public function masterdatasiswakategori(Request $request){

            $kelassiswa = $request->kelasiswa;
            $siswa = DB::table('tbl_datasiswa')->where('kelas', '=', $kelassiswa)->get();
            $kelas = DB::table('tbl_kelass')->get();
            $agama = DB::table('tbl_agama')->get();
            return view ('admin.masterdatasiswa', compact ('siswa', 'kelas', 'agama'));
        }

        public function masterdataguru(){

            $guru = Teacher::all();
            $jabatan = DB::table('tbl_jabatan')->get();
            $mapel = DB::table('tbl_mapel')->get();
            $agama = DB::table('tbl_agama')->get();
            return view ('admin.masterdataguru', compact ('guru', 'jabatan', 'mapel', 'agama'));
        }
        
        public function masterdatagurukategori(Request $request){
        
            $gurumapel = $request->gurumapel;

            $guru = Teacher::where('mapel', 'like', '%'. $gurumapel.'%')->get();
            $jabatan = DB::table('tbl_jabatan')->get();
            $mapel = DB::table('tbl_mapel')->get();
            $mapel = DB::table('tbl_mapel')->get();
            $agama = DB::table('tbl_agama')->get();
            return view ('admin.masterdataguru', compact ('guru', 'jabatan', 'mapel', 'agama'));
        }
        
        public function getmasterdatawalas()
        {
            $guru = DB::table('tbl_walikelas')->join('tbl_kelass', 'tbl_walikelas.id_kelas', '=', 'tbl_kelass.id_kelas')->orderBy('tbl_kelass.kelas', 'asc')->get();
            
            $namaguru= DB::table('teachers')->select('teachers.namaguru')->get();
            $kelas= DB::table('tbl_kelass')->get();
    
            return view('admin.masterdatawalas', compact ('guru', 'namaguru', 'kelas'));
        }
        
        public function masterabsensiswa()
        {
            $absen = Absensi::whereIn('status_absen',[0,1,2])->get();
            return view('admin.masterabsensiswa', compact ('absen'));
        }
        
        public function detailabsensiswa($id)
        {
            $absen = Absensi::find($id);
            return view('admin.detailabsen', compact ('absen'));
        }
          
        public function postmasterdatawalas(Request $request)
    {
        $this->validate($request,[
            'nuptk' => 'required | size:7| unique:tbl_walikelas',
            'namaguru' => 'required',
            'id_kelas' =>   'required', 
            ]);
            
            DB::table('tbl_walikelas')->insert([
                'nuptk' => $request->nuptk,
                'namaguru' => $request->namaguru,
                'id_kelas' => $request->id_kelas,
                ]);
            
    return redirect()->back()->with ('success', 'Data Berhasil Disimpan!');
    }
        
        public function detaildataguru($id){

            $guru = Teacher::find($id);
            return view ('admin.detaildataguru', compact ('guru'));
        }
        
        public function getupdatedataguru($id){

            $guru = Teacher::find($id);
            $jabatan = DB::table('tbl_jabatan')->get();
            $mapel = DB::table('tbl_mapel')->get();
            $agama = DB::table('tbl_agama')->get();
            return view ('admin.updatedataguru', compact ('guru', 'jabatan', 'mapel', 'agama'));
        }

        public function updatepasswordguru(Request $request, $id)
   {    
         $this->validate($request, [
        'foto' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $guru = Teacher::find($id);
        $guru->email = $request->email;
        $guru->fill([
            'password' => Hash::make($request->password)
            ])->save();

            if ($request->has('foto')){
                $request->file('foto')->move('fotoguru/', $request->file('foto')->getClientOriginalName());
                $guru->foto = $request->file('foto')->getClientOriginalName();
                $guru->save();
             } 
            return redirect ('/masterdataguru')->with ('success', 'Data Berhasil Diubah!');
    }
   
        public function postupdatedataguru(Request $request, $id){

            $this->validate($request,[
                'namaguru' => 'required',
                'nuptk' =>   'required | size:7',     
                'jabatan' => 'required',
                'mapel' => 'required',
                'jeniskelamin' => 'required',
                'Kotakelahiran' => 'required',
                'tgllahir' => 'required',
                'agama' => 'required',
                'alamat' => 'required ',
                'pendidikan' => 'required',
                'nohp' => 'required | numeric',

             ]);
          
             $guru = Teacher::find($id);
             $guru->namaguru = $request->namaguru;
             $guru->nuptk = $request->nuptk;
             $guru->jabatan = $request->jabatan;
             $guru->mapel = json_encode($request->mapel);
             $guru->jeniskelamin = $request->jeniskelamin;
             $guru->Kotakelahiran = $request->Kotakelahiran;
             $guru->tgllahir = $request->tgllahir;
             $guru->agama = $request->agama;
             $guru->alamat = $request->alamat;
             $guru->pendidikan = $request->pendidikan;
             $guru->nohp = $request->nohp;
             $guru->save();

            return redirect ('/masterdataguru')->with ('success', 'Data Guru Berhasil Diubah!');
     ;
        }

  
        public function insertdataguru(Request $request){
        
            $this->validate($request,[
            'namaguru' => 'required',
            'nuptk' =>   'required | size:7 | unique:teachers', 
            'jabatan' => 'required',
            'mapel' => 'required',
            'jeniskelamin' => 'required',
            'Kotakelahiran' => 'required',
            'tgllahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required ',
            'pendidikan' => 'required',
            'nohp' => 'required | numeric',
            'email' => 'required', 
            'password' => 'required',
            "password_confirmation" => "same:password",
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);

        $guru = Teacher::create([
            'namaguru' => $request->namaguru,
            'nuptk' => $request->nuptk,
            'jabatan' => $request->jabatan,
            'mapel'=>json_encode($request->mapel),
            'jeniskelamin' => $request->jeniskelamin,
            'Kotakelahiran' => $request->Kotakelahiran,
            'tgllahir' => $request->tgllahir,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'pendidikan' => $request->pendidikan,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'foto' => $request->foto,
            ]);
            
            if ($request->has('foto')){
                $request->file('foto')->move('fotoguru/', $request->file('foto')->getClientOriginalName());
                $guru->foto = $request->file('foto')->getClientOriginalName();
                $guru->save();
    
            }

            return redirect ('/masterdataguru')->with ('success', 'Data Guru Berhasil Ditambah!');
        }
        
        public function masterdatakelas(){

            $kelas = DB::table('tbl_kelass')->join('tbl_jurusann', 'tbl_kelass.id_jurusan', '=', 'tbl_jurusann.id_jurusan')->orderBy('tbl_kelass.kelas', 'asc')->get();

            
        return view ('admin.masterdatakelas', compact ( 'kelas') );
        }
        
        public function masterpengumuman(Request $id){

            $pengumuman = DB::table('tbl_informasi')->orderBy('tgl_terbit', 'desc')->get();

        return view ('admin.masterdatapengumuman', compact ( 'pengumuman') );
        }
        
        public function editmasterpengumuman( $id){

            $informasi = DB::table('tbl_informasi')->find($id);
       
             return view ('admin.editmasterpengumuman', compact ( 'informasi') );
        }

        public function insertkelas(Request $request){

            DB::table('tbl_kelass')->insert([
                'id_jurusan' => $request->id_jurusan,
                'kelas' => $request->kelas,
            ]);
            return redirect('/masterdatakelas')->with ('success', 'Kelas Berhasil Di Tambah');
        }
        
        public function inputabsensi(){
            
            $kelas = DB::table('tbl_kelass')->get();
            return view ('admin.inputabsensi', compact ('kelas', 'kelass'));
           
        }
        
        public function forminputabsensi($id){
            $siswa = DB::table('tbl_kelass')->join('tbl_datasiswa', 'tbl_kelass.kelas', '=', 'tbl_datasiswa.kelas')->select('tbl_datasiswa.namasiswa', 'tbl_datasiswa.nisn', 'tbl_datasiswa.jeniskelamin', 'tbl_datasiswa.kelas')->where('tbl_kelass.kelas','=', $id)->get();

            return view ('admin.forminputabsensi', compact ('siswa'));
            
        }
        
        public function getimportexcelsiswa(){

            return view ('admin.importexcel');
            
        }
        
        public function postimportexcelsiswa(Request $request){
           
          // validasi
        $this->validate($request, [
                'file' => 'required|mimes:csv,xls,xlsx' 
        ]);
 
        
        Excel::import(new ImportDataSiswa, request()->file('file'));

        return redirect ('/insertsiswa')->with ('success', 'Data Siswa Berhasil Ditambah!');

        }

        public function getimportexcelguru(){

            return view ('admin.importexcelguru');
            
        }

        public function postimportguru(Request $request){
           
        $this->validate($request, [
                'file' => 'required|mimes:csv,xls,xlsx' 
        ]);
        
        Excel::import(new ImportDataGuru, request()->file('file'));

        return redirect ('/masterdataguru')->with ('success', 'Data Guru Berhasil Ditambah!');

        }
        
        public function posttambahakunsiswaexcel(Request $request){
           
                // validasi
                $this->validate($request, [
                    'file' => 'required|mimes:csv,xls,xlsx'
                ]);


                Excel::import(new AkunSiswaImport, request()->file('file'));

                return redirect ('/gettambahakunsiswa')->with ('success', 'Data Akun Berhasil Ditambah!');}
        
        public function eksportakunsiswa()
        {
            
            return Excel::download(new AkunSiswaExport, 'AkunSiswa.xlsx');
                
        }

        public function eksportakunadmin()
        {
            
            return Excel::download(new AkunAdminExport, 'AkunAdmin.xlsx');
                
        }

        public function eksportdataguru()
        {
            return Excel::download(new ExportDataGuru, 'AkunGuru.xlsx');
        }

        public function eksportdatasiswapdf()
        {
            $nama_file = 'Data Siswa KGJ_'.date('Y-m-d').'.xlsx';
            return Excel::download(new ExportDataSiswa  , $nama_file);        
        }

        public function eksportdatakelas()
        {
            $nama_file = 'Data Kelas KGJ_'.date('Y-m-d').'.xlsx';
            return Excel::download(new ExportDataKelas  , 'Data Kelas.xlsx');        
        }

        public function gettambahakunsiswa(){
                  $akun = User::all();
                  $kelas = DB::table('tbl_kelass')->get();
                  $agama =DB::table('tbl_agama')->get();
                return view('admin.tambahakunsiswa' , compact ('akun', 'kelas', 'agama'));
        }
        
        public function gettambahakunsiswaexcel(){

                return view('admin.tambahakunsiswaexcel');

        }

        public function gettambahakunadmin(){
            $akun = Admin::all();
          return view('admin.tambahakunadmin' , compact ('akun'));

         }
        
        public function gettambahakunadminaexcel(){

                return view('admin.tambahakunadminaexcel');

        }

        public function posttambahakunsiswa(Request $request){

            $this->validate($request,[
                'namasiswa' => 'required',
                'nisn' =>   'required | size:6 | unique:tbl_datasiswa', 
                'jeniskelamin' => 'required',
                'nohp' => 'required | numeric',
                'alamat' => 'required ',
                'agama' => 'required',
                'jurusan' => 'required',
                'kelas' => 'required',
                'email' => 'required',
                'password' => 'required | size:6 | confirmed',  		
            ]);
            
            User::create([
                'namasiswa' => $request->namasiswa,
                'nisn' => $request->nisn,
                'jeniskelamin' => $request->jeniskelamin,
                'nohp' => $request->nohp,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'jurusan' => $request->jurusan,
                'kelas' => $request->kelas,
                'email' => $request->email,
                'password' => Hash::make($request['password']),
                ]);
     
            return redirect ('/gettambahakunsiswa')->with ('success', 'Data Akun Berhasil Ditambah!');
        
        }
        
        public function posttambahakunadmin(Request $request){
            

                $this->validate($request,[
                    'nama' => 'required',
                    'jeniskelamin' => 'required',
                    'agama' => 'required',
                    'email' => 'required | unique:admins',
                    'password' => 'required | size:6 ',
                    "password_confirmation" => "same:password",
                    'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                
                ]);

                
                $admin = Admin::create([
                    'nama' => $request->nama,
                    'jeniskelamin' => $request->jeniskelamin,
                    'alamat' => $request->alamat,
                    'agama' => $request->agama,
                    'email' => $request->email,
                    'password' => Hash::make($request['password']),
                    'foto' => $request->foto,
                    ]);
                    
                    if ($request->has('foto')){
                        $request->file('foto')->move('fotoadmin/', $request->file('foto')->getClientOriginalName());
                        $admin->foto = $request->file('foto')->getClientOriginalName();
                        $admin->save();
                     } 
                    return redirect ('/gettambahakunadmin')->with ('success', 'Data Akun Berhasil Ditambah!');
                    
            }
    
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
            'foto' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

         $siswa = ModelSiswa::find($id);
        
         $siswa-> update($request->all());
        
         if ($request->has('foto')){
            $request->file('foto')->move('fotosiswa/', $request->file('foto')->getClientOriginalName());
            $siswa->foto = $request->file('foto')->getClientOriginalName();
            $siswa->save();
         } 
        return redirect ('/insertsiswa')->with ('success', 'Data Berhasil Diubah!');
    }

    public function getupdateakunsiswa($id)
    {
        $akun = User::find($id);
        $kelas =ModelKelas::all();
        $jeniskelamin = DB::table('tbl_jeniskelamin')->get();
        $agama = DB::table('tbl_agama')->get();
       return view ('admin.updateakunsiswa', compact ('akun', 'kelas', 'jeniskelamin', 'agama'));
    }

    public function updateakunsiswa(Request $request, $id)
    {
        $akun = User::find($id);
        $akun-> update($request->all());
        return redirect ('/gettambahakunsiswa')->with ('success', 'Data Akun Berhasil Diubah!');

   }
   
   public function getupdateakunadmin($id)
    {
        $akun = Admin::find($id);
        $jeniskelamin = DB::table('tbl_jeniskelamin')->get();
        $agama = DB::table('tbl_agama')->get();
       return view ('admin.updateakunadmin', compact ('akun', 'jeniskelamin', 'agama'));
    }
   
   public function updateakunadmin(Request $request, $id)
   {

       $akun = Admin::find($id);
       $akun-> update($request->all());
       return redirect ('/gettambahakunadmin')->with ('success', 'Data Akun Berhasil Diubah!');

  }

   public function updatepasswordsiswa(Request $request, $id)
   {    

       $this->validate($request, [
           // check validtion for image or file
           
           'foto' => 'image|mimes:jpg,png,jpeg|max:2048',
           ]);
           
        $akun = User::find($id);
        $akun->email = $request->email;
        $akun->fill([
            'password' => Hash::make($request->password)
            ])->save();

            if ($request->has('foto')){
                $request->file('foto')->move('avasiswa/', $request->file('foto')->getClientOriginalName());
                $akun->foto = $request->file('foto')->getClientOriginalName();
                $akun->save();
             } 
            return redirect ('/gettambahakunsiswa')->with ('success', 'Data Berhasil Diubah!');
    }

   public function updatepasswordadmin(Request $request, $id)
   {    
         $this->validate($request, [
        // check validtion for image or file
        'foto' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $akun = Admin::find($id);
        
        $akun->email = $request->email;
        $akun->fill([
            'password' => Hash::make($request->password)
            ])->save();

            if ($request->has('foto')){
                $request->file('foto')->move('fotoadmin/', $request->file('foto')->getClientOriginalName());
                $akun->foto = $request->file('foto')->getClientOriginalName();
                $akun->save();
             } 
            return redirect ('/gettambahakunadmin')->with ('success', 'Data Berhasil Diubah!');
    }
    
    public function showeditdatakelas($id)
    { 
        $kelas = DB::table('tbl_kelass')->find($id);
        return view ('admin.editdatakelas', compact ('kelas'));
      
    }
    
    
        public function updatemasterdatakelas(Request $request, $id)
         {
        $siswa = DB::table('tbl_kelass')->where('id', $request->id)->update([
            'id_jurusan' => $request->id_jurusan,
            'kelas' => $request->kelas,

            ]);

            return redirect ('/masterdatakelas')->with ('success', 'Kelas Berhasil Diubah!');

            }

        public function updatemasterdatapengumuman(Request $request, $id)
        {
            $informasi = DB::table('tbl_informasi')->find($id);
                        DB::table('tbl_informasi')->where('id', $request->id)->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'untuk' => $request->untuk,
                'tgl_terbit' => $request->tgl_terbit,
                'dibuatoleh' => $request->dibuatoleh,
    
                ]);
    return redirect ('/masterdatapengumuman')->with ('success', 'Data Berhasil Diubah!');
        }

        public function settingtahunajaran(Request $id)
        {
            $thnajaran = DB::table('tbl_tahunajaran')->get();    
            
            return view ('admin.tahunajaran', compact ('thnajaran'));
        }

        public function aktifkantahunajaran(Request $equest, $id)
        {
            $namaadmin = Auth::user()->nama;
            $thnajaran = TahunAjaran::find($id);
    
            if($thnajaran->status_semester == 0){
                $thnajaran->status_semester=1;

                $thnajaran->where(['id'=>$id])
            ->update([
                'pengaktif'=>$namaadmin,
                ]);
    
                $thnajaran->save();
            }
            else{
                $thnajaran->status_semester=0;
            }
    
            return redirect('/tahunajaran')->with('succcess', 'Semester Berhasil Di Aktifkan!');
        
        }

        public function nonaktifkantahunajaran(Request $equest, $id)
        {
            $namaadmin = Auth::user()->nama;
            $thnajaran = TahunAjaran::find($id);
    
            if($thnajaran->status_semester==1){
                $thnajaran->status_semester=0;

                $thnajaran->where(['id'=>$id])
            ->update([
                'pengaktif'=>' ',
                ]);
    
                $thnajaran->save();
            }
            else{
                $thnajaran->status_semester=1;
            }
    
            return redirect('/tahunajaran')->with('succcess', 'Semester Berhasil Di Aktifkan!');
        
        }

        public function getnaikkelas(Request $request)
        {
            $kelas = DB::table('tbl_kelass')->get();    
            
            return view ('admin.naikkelas', compact ('kelas'));
        }

    public function destroy($id)
    {
        DB::table('tbl_datasiswa')->where ('id', $id)->delete();

        return redirect ('/masterdatasiswa')->with('success', 'Data Berhasli Dihapus!');


    }

    public function hapuskelas( $id)
    {
        DB::table('tbl_kelass')->where ('id', $id)->delete();
    
        return redirect ('/masterdatakelas')->with('success', 'Kelas Berhasli Dihapus!');
    }

        public function hapusakunsiswa($id)
        {
            User::where('id', $id)->delete();
        
            return redirect ('/tambahakunsiswa')->with('success', 'Akun Siswa Berhasli Dihapus!');
        }
        
        public function hapusakunadmin( $id)
        {
            DB::table('admins')->where('id', $id)->delete();
        
            return redirect ('/tambahakunadmin')->with('success', 'Akun Admin Berhasli Dihapus!');
        }
        
        public function hapusabsensiswa( $id)
        {
            DB::table('tbl_absensi')->where('id', $id)->delete();
        
            return redirect ('/masterabsensiswa')->with('success', 'Data Berhasil Berhasli Dihapus!');
        }

        public function hapusmasterdatapengumuman( $id)
        {
            DB::table('tbl_informasi')->where ('id', $id)->delete();
        
            return redirect ('/masterdatapengumuman')->with('success', ' Data Berhasli Dihapus!');
        }
        
        public function hapusdataguru( $id)
        {
            Teacher::where('id', $id)->delete();
        
            return redirect ('/masterdataguru')->with('success', ' Data Berhasli Dihapus!');
        }
    }   
