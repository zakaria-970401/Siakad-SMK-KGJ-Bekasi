<?php

namespace App\Exports;

use App\Modelsiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportDataSiswa implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Modelsiswa::select('namasiswa','nisn','jurusan','kelas','kotakelahiran', 'tgllahir','jeniskelamin','agama','namaayah','namaibu', 'anakke', 'alamatortu', 'no_teleponortu','pekerjaanayah', 'pekerjaanibu', 'foto')->get();
    }

    public function headings(): array
    {
        return [
            'namasiswa',
            'nisn',
            'jurusan',
            'kelas',
            'kotakelahiran',
            'tgllahir',
            'jeniskelamin',
            'agama' ,
            'namaayah',
            'namaibu',
            'anakke',
            'alamatortu',
            'no_teleponortu',
            'pekerjaanayah',
            'pekerjaanibu',
            'foto'
            
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

