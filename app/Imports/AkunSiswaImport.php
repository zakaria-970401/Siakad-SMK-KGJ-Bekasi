<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\User;
use Illuminate\Support\Facades\Hash;

class AkunSiswaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

        //dd($collection->all());
        
        foreach ($collection as $key =>  $row) {
            if ($key >= 3 ) {
                User::Create([
                'namasiswa' => $row[1],
                'nisn' =>$row[2],
                'jeniskelamin' =>$row[3],
                'nohp' =>$row[4],
                'alamat' =>$row[5],
                'agama' =>$row[6],
                'jurusan' =>$row[7],
                'rombel' =>$row[8],
                'kelas' =>$row[9],
                'email' =>$row[10],
                'password' =>Hash::make($row[11])
            ]);
            } 
        }
    }
}
