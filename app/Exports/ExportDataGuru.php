<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Teacher;

class ExportDataGuru implements FromCollection, ShouldAutoSize, WithEvents, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Teacher::select('namaguru','nuptk', 'jabatan', 'mapel', 'jeniskelamin', 'agama', 'tgllahir', 'kotakelahiran', 'alamat', 'pendidikan', 'nohp',  'email', 'foto')->get();
    }

    public function headings(): array
    {
        return [
            'Nama Guru',
            'NUPTK', 
            'Jabatan', 
            'Mapel',
            'jenisKelamin', 
            'Agama',
             'Tanggl Lahir', 
             'Kota Kelahiran', 
             'Alamat',
             'Pendidikan',
             'No. HP',  
             'Email Akun', 
             'Foto',            
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
