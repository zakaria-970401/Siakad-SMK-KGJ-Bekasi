<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ModelSiswa;
use App\ModelKelas;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request\hashFile;
use alert;
use Barryvdh\DomPDF\Facade as PDF;


class PdfControlller extends Controller
{

    public function __construct()
    {

                 $this->middleware('auth:admin');
    }

    public function pdfakunsiswa()
    {
        $akun = User::all();
        $pdf = pdf::loadView('pdf.pdfakunsiswa', compact ('akun'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->download('Data Akun Siswa Absensi-KGJ'.date('Y-m-d_H-i-s').'.pdf');
    }
}
