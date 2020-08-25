        @extends ('layout.masteradmin')

        @section('judul', 'Import Excel Data Guru')


        @section('konten')
        <!-- Main Container -->
        <div class="content">

        <!-- Page Content -->
        <!-- Bootstrap Design -->
        <h2 class="content-heading">Import Data Guru Excel</h2>
        <div class="row">
        <div class="col-md-6">
                <a href="/masterdataguru" class="btn btn-lg btn-primary mr-5 mb-15">
                <i class="fa fa-reply mr-5"></i>Back
            </a>
        <!-- Default Elements -->
        <div class="block">
         <div class="block-content block-content-full">
          <div class="col justify-content-center py-20">
            <a href="{{ url('/template_excel/TEMPLATE_AKUN_GURU.xlsx') }}" class="btn btn-lg btn-outline-success mr-5 mb-15">
            <i class="fa fa-file-excel-o mr-5"></i>Download Contoh Excel
           </a>
        <div class="col-xl-6">
                <div class="form-group row">
                    <label class="col-8 col-form-label" for="val-username">Pilih File : </label>
                    <form method="post" action="/insertguru/importexcel" enctype="multipart/form-data">
        {{ csrf_field() }}
                    <div class="col-12">
                    <div class="form-group">
                    <input type="file" name="file" required="required">
                </div>
                    </div>                
                <div class="col-xl-10">    
            <button type="submit" class="btn btn-secondary">
                <i class="fa fa-upload mr-5 mb-5"></i> Upload Data!
            </button>             
         </div>
     </form>
 </div>

@endsection



