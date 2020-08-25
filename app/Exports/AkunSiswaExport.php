<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AkunSiswaExport implements FromCollection, ShouldAutoSize, WithEvents, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select(
            'namasiswa' ,
            'nisn',
             'jeniskelamin', 
             'nohp',
             'alamat' , 
             'agama',
             'jurusan', 
             'kelas',
             'email',
             'foto',
             'status_akun'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'NISN',
             'Jenis Kelamin', 
             'No. HP',
             'Alamat' , 
             'Agama',
             'Jurusan', 
             'Kelas',
             'Email',
             'Foto',
             'status_akun'
            
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
