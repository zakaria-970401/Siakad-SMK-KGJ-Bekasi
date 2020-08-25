<style>
thead,
tfoot {
    background-color: #3f87a6;
    color: #fff;
}

tbody {
    background-color: #e4f0f5;
}

caption {
    padding: 10px;
    caption-side: bottom;
}

table {
    border-collapse: collapse;
    border: 2px solid rgb(200, 200, 200);
    letter-spacing: 1px;
    font-family: sans-serif;
    font-size: .8rem;
}

td,
th {
    border: 1px solid rgb(190, 190, 190);
    padding: 5px 10px;
}

td {
    text-align: center;
}
</style>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DATA AKUN GURU</title>
  </head>
  <body>
  <h3><center><strong>DATA AKUN GURU (ABSENSI-KGJ)</h3></strong>
 
  <table style="width:50%">                
  <thead>
  <tr>

                    <th class="text-center">NO</th>
                            <th class="center">Nama Guru</th>
                            <th class="text-center">NUPTK</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Mapel</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Kota Kelahiran</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Agama</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">E-mail</th>
                            <th class="text-center">Foto</th>
                            </thead>
                            </tr>

                    <tbody>
                    <?php $no = 1 ;?>
                    @foreach($guru as $gr)
                        <tr>
                        <td>{{ $no++ }}</td>
                        <td class="center">{{$gr->namaguru}}</a></td>
                        <td class="text-center">{{$gr->nuptk}}</td>
                        <td class="text-center">{{$gr->jabatan}}</td>
                        <td class="text-center">{{$gr->mapel}}</td>
                        <td class="text-center">{{$gr->jeniskelamin}}</td>
                        <td class="text-center">{{$gr->Kotakelahiran}}</td>
                        <td class="text-center">{{$gr->tgllahir}}</td>
                        <td class="text-center">{{$gr->agama}}</td>
                        <td class="text-center">{{$gr->alamat}}</td>
                        <td class="text-center">{{$gr->email}}</td> 
                        <td class="text-center">{{$gr->foto}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
       </html>