@extends ('layout.mastersiswa')

@section('judul', 'Halaman Mading Siswa')


@section('konten')
<style type="text/css">
                .pagination li{
                  float: left;
                  list-style-type: none;
                  margin:5px;
                }
                </style>
 <!-- Main Container -->
 
        <div class="content">
         <div class="block">
            <div class="block-header block-header-default bg-primary">
                            <h3 class="block-title">INFORMASI HARIAN SISWA</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            </div>
                        </div>
                        @foreach($informasi as $si)
                        <div class="block-content">
                            <ul class="list list-timeline pull-t">
                                <!-- Twitter Notification -->
                
                                <!-- Photo Notification -->
                                <li>                                   
                                        <!-- Gallery (.js-gallery class is initialized in Helpers.magnific()) -->
                                        <!-- For more info and examples you can check out http://dimsemenov.com/plugins/magnific-popup/ -->
                                        <div class="row items-push js-gallery img-fluid-100 bg-gray">
                                            <div class="col-sm- col-xl-3">
                                         
                                                <a class="img-link img-link-zoom-in img-lightbox" href="assets/media/photos/photo2@2x.jpg">
                                                    <img class="img-fluid" src="{{ asset('fotoguru/'.$si->foto)}}" style = "height: 90px; width: 90px; border-radius:50%; margin-right:15px;" alt="">
                                                </a>
                                                <p class="font-w600">{{$si->dibuatoleh}}</p>
                                            </div>
                                            </div>
                                            <br>
                                            <h4>{{$si->judul}}</h4>
                                            <div class="list-timeline-content">
                                        <p><h5>{{$si->isi}}</h5></p>
                                        </div>
                                    </div>
                                    @endforeach
                                    {{$informasi->links()}}
                                </li>
                            </div>
                         </div>

 
            

@endsection



