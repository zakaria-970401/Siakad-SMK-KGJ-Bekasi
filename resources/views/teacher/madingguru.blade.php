@extends ('layout.masterguru')

@section('judul', 'Mading Guru')

@section('konten')
<!-- Main Container -->

<!-- Dynamic Table Full -->
<br>
    
    
 <div class="content">
   <div class="block">
      <div class="block-header block-header-default">
        <h3 class="block-title">PENGUMUMAN UNTUK GURU</h3>
        </div>
        <div class="block-content block-content-full">
            <div class="block">
                <div class="block-content block-content-full">
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr class="bg-info">
                                <th class="text-center">NO</th>
                                <th class="text-center"  style="width: 5%;" >TANGGAL TERBIT</th>
                                <th class="text-center"  style="width: 10%;">JUDUL PENGUMUMAN</th>
                                <th class="text-center"  style="width: 55%;">ISI PENGUMUMAN</th>
                                <th class="text-center"  style="width: 10%;">DIBUAT OLEH</th>
                                <th class="text-center" style="width: 10%;" >FOTO</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($pengumuman as $pengu)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$pengu->tgl_terbit}}</td>
                                <td class="text-center">{{$pengu->judul}}</td>
                                <td class="text-center">{{$pengu->isi}}</td>
                                <td class="text-center">{{$pengu->dibuatoleh}}</td>
                                <td class="text-center"><img src="{{ asset('fotoadmin/'.$pengu->foto)}}" style = "height: 80px; width: 80px;" alt=""></td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
       
@endsection