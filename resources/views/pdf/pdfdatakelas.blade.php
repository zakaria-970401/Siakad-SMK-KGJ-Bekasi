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
    <title>DATA KELAS SMK KGJ</title>
  </head>
  <body>
  <h3><center><strong>DATA SISWA/I SMK KARYA GUNA JAYA BEKASI (ABSENSI-KGJ)</h3></strong>

  <table style="width:100%">                
  <thead>
  <tr>

                            <th class="text-center">NO</th>
                            <th class="text-center">Jurusan</th>
                            <th class="text-center">Kelas</th>
                            </thead>
                            </tr>

                    <tbody>
                    <?php $no = 1 ;?>
                    @foreach($kelas as $kelas)
                        <tr>
                        <td>{{ $no++ }}</td>
                        <td class="text-center">{{$kelas->jurusan}}</td>
                        <td class="text-center">{{$kelas->kelas}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
       </html>  