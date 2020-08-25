@extends ('layout.masteradmin')

@section('judul', 'Input Absensi Siswa')


@section('konten')
<!-- Main Container -->
<div class="content">

<!-- Page Content -->
<!-- Bootstrap Design -->
<h2 class="content-heading">Input Absensi Siswa SMK KARGA GUNA JAYA</h2>
<div class="row">
    <div class="col-md-6">
        <!-- Default Elements -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Pilih Kelas </h3>
                
            </div>
            
            {{ csrf_field() }}
        <div class="col justify-content-center py-20">
            <div class="col-xl-6">
                <!-- jQuery Validation functionality is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js -->
                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <div class="form-group row">
                        <label class="col-4 col-form-label" for="val-username">Kelas : </label>
                        <div class="col-12">
                            <select class="js-select2 form-control" id="id_kelas" name="id_kelas" style="width: 100%;" data-placeholder="Pilih ..">

                            @foreach ($kelas as $kls)
                                <option></option><!-- Required for data-placeholder attribute to workls with Select2 plugin -->
                                <option value="{{$kls->kelas}}">{{$kls->kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
            <div class="col-md-6">    
                <button id="klik" name="klik" type="submit" class="btn btn-secondary">
                    <i class="fa fa-search"></i> Search
                </button>    
            </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">
        $( "#klik" ).click(function() {
            location.href = "inputabsensi/"+document.getElementById('id_kelas').value+"/input";
        });
    </script>
    


@endsection



