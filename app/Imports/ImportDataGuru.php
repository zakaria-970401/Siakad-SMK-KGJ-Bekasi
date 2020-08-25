<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Teacher;

class ImportDataGuru implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
//     dd($collection->all());
        foreach ($collection as $key =>  $row) {
            if ($key >= 3 ) {
                $tgl_lahir = ($row[7] - 25569) * 86400;
                
            Teacher::Create([
                'namaguru' => $row[1],
                'nuptk' =>$row[2],
                'jabatan' =>$row[3],
                'Kotakelahiran' =>$row[4],
                'jeniskelamin' =>$row[5],
                'mapel' =>$row[6],
                'tgllahir' =>gmdate('Y-m-d', $tgl_lahir),
                'agama' =>$row[8],
                'alamat' =>$row[9],
                'pendidikan' =>$row[10],
                'nohp' =>$row[11],
                'email' =>$row[12],
                'password' =>$row[13], 
            ]);
            } 
        }
    }
}
