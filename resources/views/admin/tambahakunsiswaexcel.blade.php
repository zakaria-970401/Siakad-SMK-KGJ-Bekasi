    @extends ('layout.masteradmin')

    @section('judul', 'Import Excel Data Siswa')


    @section('konten')
    <!-- Main Container -->
    <div class="content">

    <!-- Page Content -->
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Import Akun Siswa Excel</h2>
    <div class="row">
    <div class="col-md-6">
            <a href="/gettambahakunsiswa" class="btn btn-primary mr-5 mb-15">
            <i class="fa fa-reply mr-5"></i>Back
        </a>    
    <!-- Default Elements -->
    <div class="block">
    <div class="block-content block-content-full">
    <div class="col justify-content-center py-20">
     <a href="{{ url('/template_excel/TEMPLATE_AKUN_SISWA.xlsx') }}" class="btn btn-lg btn-outline-success mr-5 mb-15">
            <i class="fa fa-file-excel-o mr-5"></i>Download Contoh Excel
        </a>
    <div class="col-xl-10">
            <div class="form-group row">
                <label class="col-4 col-form-label" for="val-username">Pilih File : </label>
                <form method="post" action="/gettambahakunsiswa/importexcel" enctype="multipart/form-data">
    {{ csrf_field() }}
                <div class="col-12">
                <div class="form-group">
                <input type="file" name="file" required="required" value="import">
            </div>
                </div>
            </div>
            </div>
            <div class="col-8 col-xl-8">
            <div class="mb-20  d-inline">
        <button type="submit" class="btn btn-secondary inline">
            <i class="fa fa-upload mr-5 mb-5"></i> Upload Data!
        </button>    
    </div>
    </div>
    </form>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">
    $( "#klik" ).click(function() {
    location.href = "inputabsensi/"+document.getElementById('id_kelas').value+"/input";
    });
    </script>
    </div>



    @endsection



