        @extends ('layout.masteradmin')

        @section('judul', 'Halaman Utama Admin')

        @section('konten')
        <br>
        <div class="col-md-6">
            <a href="/inputabsensi" class="btn btn-lg btn-primary mr-5 mb-15">
            <i class="fa fa-reply mr-5"></i>Back
        </a>
        </div>
        <div class="content">

    <script> 
    $(function ( {
        $("tabs").tabs();
        
    });

    </script>
        <div class="block">
        <div class="block-header block-header-default">
        <h3 class="block-title">Pilih Jam : </h3>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Block Tabs Animated Fade -->
                                <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#tabs">Jam Ke 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#btabs-animated-fade-profile">Jam Ke 2</a>
                                    </li>
                            
                                    <li class="nav-item">
                                        <a class="nav-link" href="#btabs-animated-fade-profile">Jam Ke 3</a>
                                    </li>
                            
                                    <li class="nav-item">
                                        <a class="nav-link" href="#btabs-animated-fade-profile">Jam Ke 4</a>
                                    </li>
                            
                                    <li class="nav-item">
                                        <a class="nav-link" href="#btabs-animated-fade-profile">Jam Ke 5</a>
                                    </li>
                            
                                    <li class="nav-item">
                                        <a class="nav-link" href="#btabs-animated-fade-profile">Jam Ke 6</a>
                                    </li>
                            
                                    <li class="nav-item">
                                        <a class="nav-link" href="#btabs-animated-fade-profile">Jam Ke 7</a>
                                    </li>
                            
                                    <li class="nav-item">
                                        <a class="nav-link" href="#btabs-animated-fade-profile">Jam Ke 8</a>
                                    </li>
                            
                                    <li class="nav-item">
                                        <a class="nav-link" href="#btabs-animated-fade-profile">Jam Ke 9</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#btabs-animated-fade-profile">Jam Ke 10</a>
                                    </li>
                            
        </div>
                                    </div>
                                    </div>
        <div class="block-content block-content-full">
        <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
        <thead>
            <tr>
                <th class="text-center" style="width: 3%;">No</th>
                <th class="text-center" style="width: 13%;">Nama</th>
                <th class="text-center" style="width: 3%;">NISN</th>
                <th class="text-center" style="width: 5%;">Kelas</th>
                <th class="text-center" style="width: 13%;" style="width: 15%;">Jenis Kelamin</th>
                <th class="text-center" style="width: 15%;">Keterangan</th>
            </tr>
        </thead>
        <tbody>
        @foreach($siswa as $sw)
            <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td class="font-w600">{{$sw->namasiswa}}</td>
            <td class="d-none d-sm-table-cell">   <span class="badge badge-success">{{$sw->nisn}}</td>
            <td class="d-none d-sm-table-cell">
            {{$sw->kelas}}
            </td>
            <td class="d-none d-sm-table-cell">
            {{$sw->jeniskelamin}}
            </td>
        <td>     
        <div class="row no-gutters items-push">
            <div class="form-group">
                    <label class="css-control css-control-success css-radio">
                    <input type="radio" class="css-control-input" name="absensi-idsiswa" value ="M" checked='checked'>
                    <span class="css-control-indicator"></span> M
                </label>
                    <label class="css-control css-control-success css-radio">
                    <input type="radio" class="css-control-input" name="absensi-idsiswa"  value ="S" >
                    <span class="css-control-indicator"></span> S
                </label>
                </label>
                    <label class="css-control css-control-success css-radio">
                    <input type="radio" class="css-control-input" name="absensi-idsiswa"  value ="I" >
                    <span class="css-control-indicator"></span> I
                </label>
                    <label class="css-control css-control-success css-radio">
                    <input type="radio" class="css-control-input" name="absensi-idsiswa"  value ="A" >
                    <span class="css-control-indicator"></span> A
                </div>
            </td>
          </tr>
                @endforeach
       </tbody>
   </table>
</div>
</div>
        @endsection



