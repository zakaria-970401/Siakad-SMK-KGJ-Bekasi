<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use App\ModelKelas;

class ExportsNilaiSiswa implements FromCollection,  WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ModelNilai::select('id_tahunajaran','id_semester', 'nisn', 'namasiswa', 'kelas', 'mapel', 'nilai_uts', 'nilai_uas', 'nilai_tugas', 'nilai_harian', 'nilai_praktek')->get();
    }
    public function headings(): array
    {
        return [
            'TAHUN AJARAN',
            'SEMESTER',
            'NISN',
            'NAMA SISWA ',
            'KELAS',
            'MAPEL',
            'NILAI UTS',
            'NILAI UAS',
            'NILAI TUGAS',
            'NILAI HARIAN',
            'NILAI PRAKTEK',
 
        ];
    }
    public function registerEvents(): array
    {
        return [
            
            AfterSheet::class=>function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];

       
    }
}
