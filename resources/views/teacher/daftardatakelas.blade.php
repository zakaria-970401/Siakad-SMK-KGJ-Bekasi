@extends ('layout.masterguru')

@section('judul', 'Daftarr Data Kelas')

@section('konten')



 <!-- Bordered Table -->
 <div class="content">
        <div class="block">
                        <div class="block-header bg-light">
                            <h3 class="block-title">Master Data Kelas</h3>
                         </div>
                        <div class="block-content">          
                        {{ csrf_field() }}
                            <table class="table table-bordered table-vcenter">
                            <thead class="bg-info">
                                    <tr>
                                        <th class="text-center">NO.</th>
                                        <th class="text-center">JURUSAN</th>
                                        <th class="text-center">KELAS</th>
                                        <th class="text-center">WALI KELAS</th>
                                        <th class="text-center">AKSI</th>
                                    </tr>
                                </thead>
                                     <tbody>
                                     @foreach ($kelas as $kls)
                                        <tr>
                                        <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                        <td class="text-center">{{$kls->jurusan}}</td>
                                        <td class="text-center">
                                        <input type="hidden" name="id_kelas" id="id_kelas" value="{{$kls->kelas}}" readonly>{{$kls->kelas}}</td>
                                        <td class="text-center">{{$kls->namaguru}}</td>
                                        <td class="text-center">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="si si-eye mr-5"></i>Lihat</button>
                                        </tr>
                                        </td>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">
        $( "#klik" ).click(function() {
            location.href = "detaildatakelas/"+document.getElementById('id_kelas').value+"/detail";
        });
    </script>
    

@endsection
