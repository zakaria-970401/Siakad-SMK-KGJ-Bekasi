<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\ModelSiswa;

class ImportDataSiswa implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

        
        foreach ($collection as $key =>  $row) {
            if ($key >= 3 ) {

                $tgl_lahir = ($row[6] - 25569) * 86400;
            ModelSiswa::Create([
                'namasiswa' => $row[1],
                'nisn' =>$row[2],
                'jurusan' =>$row[3],
                'kelas' =>$row[4],
                'kotakelahiran' =>$row[5],
                'tgllahir' =>gmdate('Y-m-d', $tgl_lahir),
                'jeniskelamin' =>$row[7],
                'agama' =>$row[8],
                'namaayah' =>$row[9],
                'namaibu' =>$row[10],
                'anakke' =>$row[11],
                'alamatortu' =>$row[12],
                'no_teleponortu' =>$row[13],
                'pekerjaanayah' =>$row[14],
                'pekerjaanibu' =>$row[15],
                
            ]);
            } 
        }
    }
}
