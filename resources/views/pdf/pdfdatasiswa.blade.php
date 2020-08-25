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
    <title>Data Siswa KGJ</title>
  </head>
  <body>
  <h3><center><strong>DATA SISWA/I SMK KARYA GUNA JAYA BEKASI (ABSENSI-KGJ)</h3></strong>

  <table style="width:50%">                
  <thead>
  <tr>

                    <th class="text-center">NO</th>
                            <th class="center">Nama Siswa</th>
                            <th class="text-center">NISN</th>
                            <th class="text-center">Jurusan</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Kota Kelahiran</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Agama</th>
                            <th class="text-center">Nama Wali</th>
                            <th class="text-center">Anak Ke</th>
                            <th class="text-center">Alamat Wali</th>
                            <th class="text-center">No. Telp Wali</th>
                            <th class="text-center">Pekerjaan Wali</th>
                            <th class="text-center">Foto</th>
                            </thead>
                            </tr>

                    <tbody>
                    <?php $no = 1 ;?>
                    @foreach($siswa as $si)
                        <tr>
                        <td>{{ $no++ }}</td>
                        <td class="center">{{$si->namasiswa}}</a></td>
                        <td class="text-center">{{$si->nisn}}</td>
                        <td class="text-center">{{$si->jurusan}}</td>
                        <td class="text-center">{{$si->kelas}}</td>
                        <td class="text-center">{{$si->kotakelahiran}}</td>
                        <td class="text-center">{{$si->tgllahir}}</td> 
                        <td class="text-center">{{$si->jeniskelamin}}</td> 
                        <td class="text-center">{{$si->agama}}</td> 
                        <td class="text-center">{{$si->namaayah}}</td> 
                        <td class="text-center">{{$si->anakke}}</td>
                        <td class="text-center">{{$si->alamatortu}}</td>
                        <td class="text-center">{{$si->no_teleponortu}}</td>
                        <td class="text-center">{{$si->pekerjaanayah}}</td>
                        <td class="text-center">{{$si->foto}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
       </html>