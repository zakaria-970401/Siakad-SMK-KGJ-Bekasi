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
    <title>DATA AKUN ADMIN</title>
  </head>
  <body>
  <h3><center><strong>DATA AKUN ADMIN (ABSENSI-KGJ)</h3></strong>
  <table style="width:100%">                
  <thead>
  <tr>

                    <th class="text-center">NO</th>
                            <th class="center">Nama Admin</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Agama</th>
                            <th class="text-center" style="width: 5%;">E-mail</th>
                            <th class="text-center">Password</th>
                            <th class="text-center">Foto</th>
                            </thead>
                            </tr>

                    <tbody>
                    <?php $no = 1 ;?>
                    @foreach($akun as $ak)
                        <tr>
                        <td>{{ $no++ }}</td>
                        <td class="center">{{$ak->nama}}</a></td>
                        <td class="text-center">{{$ak->jeniskelamin}}</td>
                        <td class="text-center">{{$ak->agama}}</td> 
                        <td class="text-center">{{$ak->email}}</td> 
                        <td class="text-center">************</td>
                        <td class="text-center">{{$ak->foto}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
       </html>