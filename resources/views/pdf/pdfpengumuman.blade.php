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
    <title>MASTER DATA PENGUMUMAN SMK KGJ</title>
  </head>
  <body>
  <h3><center><strong>MASTER DATA PENGUMUMAN (ABSENSI-KGJ)</h3></strong>

  <table style="width:100%">                
  <thead>
  <tr>

                            <th class="text-center">NO</th>
                            <th class="text-center">TANGGAL TERBIT</th>
                            <th class="text-center">JUDUL PENGUMUMAN</th>
                            <th class="text-center">ISI</th>
                            <th class="text-center">DIBUAT OLEH</th>
                            </thead>
                            </tr>
                            


                    <tbody>
                    <?php $no = 1 ;?>
                    @foreach($informasi as $info)
                        <tr>
                        <td>{{ $no++ }}</td>
                        <td class="text-center">{{$info->tgl_terbit}}</td>
                        <td class="text-center">{{$info->judul}}</td>
                        <td class="text-center">{{$info->isi}}</td>
                        <td class="text-center">{{$info->dibuatoleh}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
       </html>  