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
use App\ModelNilai;
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
use Auth;
use Illuminate\Support\Facades\Redirect;


class GuruController extends Controller
{

    public function __construct()
    {

    $this->middleware('auth:teacher');
    }

    public function timeZone($location)
    {
        return date_default_timezone_set($location);
    }

    public function index(Request $request)
    {
      
        $datasiswa = DB::table('tbl_datasiswa')->count();
        $dataakunsiswa = DB::table('users')->count();
        $dataakunguru = DB::table('teachers')->count();
        $dataakunadmin = DB::table('admins')->count();
        $datakelas = DB::table('tbl_kelass')->count();

        return view ('teacher.index', compact ('datasiswa', 'dataakunsiswa', 'dataakunguru', 'datakelas'));
    }

    public function postinformasi(Request $request)
    {
        $this->validate($request,[
            'judul' =>   'required', 
    		'isi' => 'required',
            ]);

        $this->timeZone('Asia/Jakarta');  
            
        $tglterbit = date("Y-m-d");
        $namaguru = Auth::user()->namaguru;
        $fotoguru = Auth::user()->foto;

            DB::table('tbl_informasi')->insert([
                'tgl_terbit' => $tglterbit,
                'untuk' => $request->untuk,
                'judul' => $request->judul,
                'isi' => $request->isi,
                'dibuatoleh' => $namaguru,
                'foto' => $fotoguru,
                ]);
            
        return redirect ('/guru/index')->with ('success', 'Informasi Berhasil Dikirim!');
    }
    
    public function informasiguru()
    {
        $pengumuman = DB::table('tbl_informasi')->where('untuk', '=', 'guru')->orderBy('tgl_terbit', 'desc')->get();

        return view ('teacher.madingguru', compact ( 'pengumuman') );
    }
    public function informasisiswa()
    {
        $pengumuman = DB::table('tbl_informasi')->where('untuk', '=', 'siswa')->orderBy('tgl_terbit', 'desc')->get();

        return view ('teacher.madingsiswa', compact ( 'pengumuman') );
    }

    public function editinformasisiswa( $id){

        $informasi = DB::table('tbl_informasi')->find($id);
   
         return view ('teacher.editpengumumansiswa', compact ( 'informasi') );
    }

    public function updateinformasisiswa(Request $request, $id)
    {
        $informasi = DB::table('tbl_informasi')->find($id);
                    DB::table('tbl_informasi')->where('id', $request->id)->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'untuk' => $request->untuk,
            'tgl_terbit' => $request->tgl_terbit,
            'dibuatoleh' => $request->dibuatoleh,

            ]);
    return redirect ('/guru/informasisiswa')->with ('success', 'Data Berhasil Diubah!');

    }
    public function pdfdatasiswa()
    {
        $siswa = ModelSiswa::all();
        $pdf = pdf::loadView('pdf.pdfdatasiswa', compact ('siswa'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->download('Data Siswa KGJ'.date('Y-m-d').'.pdf');
    }

    public function eksportdatasiswa()
    {
        
        return Excel::download(new ExportDataSiswa, 'DataSiswa-KGJ.xlsx');
            
    }
    
    public function daftarakunsiswa()
    {
        $akunsiswa = User::All();
        return view('teacher.daftarakunsiswa', compact ('akunsiswa'));
            
    }
    
    public function eksportakunsiswa()
    {
        
        return Excel::download(new AkunSiswaExport, 'AkunSiswa.xlsx');
            
    }
    
    public function eksportdataguru()
    {
        
        return Excel::download(new ExportDataGuru, 'DataGuruKGJ.xlsx');
            
    }
       public function pdfakunsiswa()
    {
        $akun = User::all();
        $pdf = pdf::loadView('pdf.pdfakunsiswa', compact ('akun'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->download('Data Akun Siswa Absensi-KGJ'.date('Y-m-d').'.pdf');
    }
    
        public function pdfdataguru()
    {
        $guru = Teacher::all();
        $pdf = pdf::loadView('pdf.pdfdataguru', compact ('guru'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->download('Data Akun Guru Absensi-KGJ'.date('Y-m-d').'.pdf');
    }
    public function daftarabsensiswa()
    {
        $absen = Absensi::whereIn('status_absen',[1,2])->get();
        $kelas = DB::table('tbl_kelass')->get();
        return view ('teacher.daftarabsensiswa', compact ('absen', 'kelas'));
    }

    public function verifikasiabsen(Request $id)
    {
        $hadir = DB::table('tbl_absensi')->whereNotNull('jam_masuk')->where('status_absen', '=', 0)->count();    
        $sakit = DB::table('tbl_absensi')->where('sakit', '=', 1)->where('status_absen', '=', 0)->count();
        $izin = DB::table('tbl_absensi')->where('izin', '=', 1)->where('status_absen', '=', 0)->count();
        
        $absen = DB::table('tbl_absensi')->where('status_absen', "=", 0)->get();
        return view ('teacher.verifikasiabsen', compact('absen', 'sakit', 'hadir', 'izin'));
    }
    
    public function statusverifikasiabsen(Request $request, $id)
    {
        $siswa = Absensi::find($id);
        $guru = Auth::user()->namaguru;
        $tglabsen = date("Y-m-d");


        if($siswa->status_absen == 0){
            $siswa->status_absen=1;

            $siswa->where(['tglabsen'=>$tglabsen, 'id'=>$id])
            ->update([
                'diperiksaoleh'=>$guru,
                ]);

            $siswa->save();
        }
        else{
            $siswa->status_absen=0;
        }

        return redirect('/guru/verifikasiabsen')->with('succcess', 'Absen Siswa Berhasil Di Simpan!');
    
    }


    public function tolakverifikasiabsen(Request $request, $id)
    {
        
        $absen = Absensi::find($id);
        $tglabsen = date("Y-m-d");
        $diperiksaoleh = Auth::user()->namaguru;

        $alasanditolak = $request->alasanditolak; 

        
        if($absen->status_absen == 0){
            $absen->status_absen=2;
            
            $absen->where(['tglabsen'=>$tglabsen, 'id'=>$id])
            ->update([
                'diperiksaoleh'=>$diperiksaoleh,
                'alasanditolak'=>$alasanditolak,
                ]);
                
                $absen->save();
                
            }
            else{
                $absen->status_absen=2;
            }
            
            return redirect('/guru/verifikasiabsen')->with('success', 'Absen Siswa Berhasil Di Tolak '); 
    
        }
        
        public function geteditabsensiswa($id)
        {
            $absen = Absensi::find($id);
            
            return view('teacher.editabsensi', compact ('absen'));
        }
        
        public function postupdateabsensiswa(Request $request, $id)
        {
        $absen = Absensi::find($id);
        
        $tglabsen = date("Y-m-d");
        $diperiksaoleh = $request->diperiksaoleh; 
        $alasanditolak = $request->alasanditolak; 
        
        if($absen->status_absen == 1){
            $absen->status_absen=2;
            $absen->where(['tglabsen'=>$tglabsen, 'id'=>$id])
            ->update([
                'diperiksaoleh'=>$diperiksaoleh,
                'alasanditolak'=>$alasanditolak,
                ]);
            $absen->save();
        }

          elseif($absen->status_absen == 2){
            $absen->status_absen=1;
            $absen->save();

        }
          
        return redirect('/guru/daftarabsen')->with('success', 'Absensi Berhasil Diubah');
    }

    public function laporanabsenkategori(Request $request)
    {
        $kelas = DB::table('tbl_kelass')->get();
        $kateori_tglabsen= $request->kategori_tglabsen;
        $absen = DB::table('tbl_absensi')->where('tglabsen', '=', $kateori_tglabsen)->get();

        return view('teacher.daftarabsensiswa', compact ('absen', 'kelas'));
    }
    
    public function laporanabsenkategorikelas(Request $request)
    {

        $kelas = DB::table('tbl_kelass')->get();
        $kateori_tglabsen= $request->kategori_tglabsen;
        $kategorikelas= $request->kategorikelas;
        $absen = DB::table('tbl_absensi')->where('kelas', '=', $kategorikelas)->get();

        return view('teacher.daftarabsensiswa', compact ('absen', 'kelas'));
    }

    public function detailtolakabsen(Request $request, $id)
    {
        $absen = Absensi::find($id);
        
        return view('teacher.detailtolakabsen', compact ('absen'));
    }

    public function detaildatasiswa($id)
    {
            $siswa = ModelSiswa::find($id);
            $kelas = DB::table('tbl_kelass')->get();
            $agama = DB::table('tbl_agama')->get();
            return view ('teacher.detaildatasiswa', compact ('siswa', 'kelas', 'agama'));
    }
    
    public function detailakunsiswa($id)
    {
        $akun = User::find($id);
        $kelas =ModelKelas::all();
        $jeniskelamin = DB::table('tbl_jeniskelamin')->get();
        $agama = DB::table('tbl_agama')->get();
       return view ('teacher.detailakunsiswa', compact ('akun', 'kelas', 'jeniskelamin', 'agama'));
    }
    

    public function daftardataguru()
    {
        $guru = Teacher::All();
        $jabatan = DB::table('tbl_jabatan')->get();
        $mapel = DB::table('tbl_mapel')->get();
        $mapel = DB::table('tbl_mapel')->get();
        $agama = DB::table('tbl_agama')->get();     
        return view('teacher.daftardataguru', compact ('guru', 'jabatan', 'mapel', 'agama'));
    }
    
    public function daftardatagurukategori(Request $request){
        
        $gurumapel = $request->gurumapel;

        $guru = Teacher::where('mapel', 'like', '%'. $gurumapel.'%')->get();
        $jabatan = DB::table('tbl_jabatan')->get();
        $mapel = DB::table('tbl_mapel')->get();
        $mapel = DB::table('tbl_mapel')->get();
        $agama = DB::table('tbl_agama')->get();
        return view ('teacher.daftardataguru', compact ('guru', 'jabatan', 'mapel', 'agama'));
    }

    public function daftardatawalikelas()
    {
        $guru = DB::table('tbl_walikelas')->join('tbl_kelass', 'tbl_walikelas.id_kelas', '=', 'tbl_kelass.id_kelas')->orderBy('tbl_kelass.kelas', 'asc')->get();
     
        return view('teacher.daftarwalikelas', compact ('guru'));
    }
    
    public function daftardatakelas()
    {
        $kelas = DB::table('tbl_kelass')->join('tbl_jurusann', 'tbl_kelass.id_jurusan', '=', 'tbl_jurusann.id_jurusan')->join('tbl_walikelas', 'tbl_kelass.id_kelas', '=', 'tbl_walikelas.id_kelas')->orderBy('tbl_kelass.kelas', 'asc')->get();
        return view('teacher.daftardatakelas', compact ('kelas'));
    }
   
    public function detaildatakelas($id)
    {
        $siswa = DB::table('tbl_kelass')->find($id);

        $kelas = DB::table('tbl_kelass')->join('tbl_datasiswa', 'tbl_kelass.kelas', '=', 'tbl_datasiswa.kelas')->select('tbl_datasiswa.namasiswa', 'tbl_datasiswa.nisn', 'tbl_datasiswa.kelas')->where('tbl_kelass.kelas', '=', $id)->get();

        return view('teacher.detaildatakelas', compact ('kelas', 'siswa'));
    }
    
    public function detaildataguru($id)
    {
        $guru = Teacher::find($id);

        return view('teacher.detaildataguru', compact ('guru'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $datasiswa = DB::table('tbl_datasiswa')->get();
        $kelas = DB::table('tbl_kelass')->get();
        return view ('teacher.daftardatasiswa', compact ('datasiswa', 'kelas'));
    }
    
    public function showsiswa(Request $request)
    {
       // dd($request->all());
        $kelassiswa = $request->kelasiswa;
        $datasiswa = DB::table('tbl_datasiswa')->where('kelas', '=', $kelassiswa)->get();
        
        $kelas = DB::table('tbl_kelass')->get();
        return view ('teacher.daftardatasiswa', compact ('datasiswa', 'kelas', 'kelasiswa'));
    }

    public function getinputnilaisiswa()
    {
        $kelas = DB::table('tbl_kelass')->get();
        
        return view ('teacher.inputnilaisiswa', compact ('kelas'));
    }
    
    public function forminputnilaisiswa(Request $request, $id)
    {
        $mapel = Auth::user()->mapel;
       
        $nilai = DB::table('tbl_nilai')->find($id);

        $matapelajaran = json_decode($mapel);

        $thn_ajaran = DB::table('tbl_tahunajaran')->where('status_semester', '=', 1)->get();
    
        $siswa = DB::table('tbl_kelass')->join('tbl_datasiswa', 'tbl_kelass.kelas', '=', 'tbl_datasiswa.kelas')->join('tbl_walikelas', 'tbl_kelass.id_kelas', '=', 'tbl_walikelas.id_kelas')->select('tbl_datasiswa.namasiswa', 'tbl_datasiswa.nisn', 'tbl_datasiswa.kelas', 'tbl_walikelas.namaguru')->where('tbl_kelass.kelas','=', $id)->get();

            
        return view ('teacher.forminputnilai', compact ('mapel', 'matapelajaran', 'siswa', 'nilai', 'thn_ajaran'));
    }

    public function profileguru(Request $id)
    {
        return view ('teacher.profileguru');
    }

    public function getupdateakunguru($id){

        $guru = Teacher::find($id);
        $jabatan = DB::table('tbl_jabatan')->get();
        $mapel = DB::table('tbl_mapel')->get();
        $jeniskelamin = DB::table('tbl_jeniskelamin')->get();
        $agama = DB::table('tbl_agama')->get();
        return view ('teacher.updateakunguru', compact ('guru', 'jabatan', 'mapel', 'agama', 'jeniskelamin'));
    }

    public function updateakunguru(Request $request, $id)
    {
        $guru = Teacher::find($id);
         $guru-> update($request->all());
         if ($request->has('foto')){
            $request->file('foto')->move('fotoguru/', $request->file('foto')->getClientOriginalName());
            $guru->foto = $request->file('foto')->getClientOriginalName();
            $guru->save();
         } 
                return redirect ('/guru/profileguru')->with ('success', 'Data Berhasil Diubah!');
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
             return redirect ('/guru/profileguru')->with ('success', 'Data Berhasil Diubah!');
     }


    public function inputnilaitugas(Request $request)
    {   

  // dd($request->all());
        $nisn = $request->nisn;
  
        for($i=0; $i < count($nisn); $i++)
    {
            ModelNilai::updateOrCreate([
            'id_tahunajaran'=>($request->id_tahunajaran),            
            'id_semester'=>($request->id_semester),            
            'nisn'=>($request->nisn[$i]),            
            'namasiswa'=>($request->namasiswa[$i]),   
            'kelas'=>($request->kelas)[$i],
            'mapel'=>($request->mapel),   
            'nilai_tugas'=>($request->nilai_tugas[$i])
        ]);

    }

    
        return back()->with('success', 'Nilai Tugas Berhasil DiSimpan!');  

        /*$nilai = DB::table('tbl_nilai')->insert([
            'nisn' =>json_encode($request->nisn),
            'namasiswa' =>json_encode($request->namasiswa),
            'kelas' =>json_encode($request->kelas),
            'mapel' =>json_encode($request->mapel),
            'nilai_tugas' =>json_encode($request->nilai_tugas)
            ]); */
            
            //return redirect()->back()->with('success', 'Nilai Tugas Berhasil DiSimpan!');  
    }
    
    public function inputnilaiuts(Request $request)
    {                 
        $nisn = $request->nisn;

        for($i=0; $i < count($nisn); $i++)
    {
            ModelNilai::where('nisn',$nisn[$i])->update([
            'id_tahunajaran'=>($request->id_tahunajaran),            
            'id_semester'=>($request->id_semester),            
            'nisn'=>($request->nisn[$i]),            
            'namasiswa'=>($request->namasiswa[$i]),   
            'kelas'=>($request->kelas)[$i],
            'mapel'=>($request->mapel),   
            'nilai_uts'=>($request->nilai_uts[$i])
        ]);
    }
    return back()->with('success', 'Nilai UTS Berhasil DiSimpan!');  

}
    
    public function inputnilaiuas(Request $request)
    {       
        $nisn = $request->nisn;

        for($i=0; $i < count($nisn); $i++)
    {
            ModelNilai::where('nisn',$nisn[$i])->update([
                'id_tahunajaran'=>($request->id_tahunajaran),            
                'id_semester'=>($request->id_semester),            
                'nisn'=>($request->nisn[$i]),            
                'namasiswa'=>($request->namasiswa[$i]),   
                'kelas'=>($request->kelas)[$i],
                'mapel'=>($request->mapel),   
                'nilai_uas'=>($request->nilai_uas[$i])
        ]);
    }
    return back()->with('success', 'Nilai UAS Berhasil DiSimpan!');  

}
    
    public function inputnilaiharian(Request $request)
    {       
        $nisn = $request->nisn;

        for($i=0; $i < count($nisn); $i++)
    {
            ModelNilai::where('nisn',$nisn[$i])->update([
                'id_tahunajaran'=>($request->id_tahunajaran),            
                'id_semester'=>($request->id_semester),            
                'nisn'=>($request->nisn[$i]),            
                'namasiswa'=>($request->namasiswa[$i]),   
                'kelas'=>($request->kelas)[$i],
                'mapel'=>($request->mapel),   
                'nilai_harian'=>($request->nilai_harian[$i])
        ]);
    }
    return back()->with('success', 'Nilai HARIAN Berhasil DiSimpan!');  

}
    
    public function inputnilaipraktek(Request $request)
    {       
        $nisn = $request->nisn;

        for($i=0; $i < count($nisn); $i++)
    {
            ModelNilai::where('nisn',$nisn[$i])->update([
           'id_tahunajaran'=>($request->id_tahunajaran),            
            'id_semester'=>($request->id_semester),            
            'nisn'=>($request->nisn[$i]),            
            'namasiswa'=>($request->namasiswa[$i]),   
            'kelas'=>($request->kelas)[$i],
            'mapel'=>($request->mapel),   
            'nilai_praktek'=>($request->nilai_praktek[$i])
        ]);
    }
    return back()->with('success', 'Nilai PRAKTEK Berhasil DiSimpan!');  

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
        //
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
