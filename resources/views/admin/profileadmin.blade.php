    @extends('layout/masteradmin')

    @section('judul', 'Profile Admin')


    @section('konten')

    <!-- Page Content -->
    <!-- User Info -->
    <div class="content">

    <div class="bg-image bg-image" style="background-image: url('assets/media/photos/photo13@2x.jpg');">
    <div class="bg-primary-dark-op py-10">
    <div class="content content-full text-center">
    <!-- Avatar -->
    <div class="mb-15">
    <a class="img-link" data-toggle="modal" href="#modal-fromleft">
    <img class="img-avatar" src="{{ asset('fotoadmin/'.Auth::user()->foto)}}" style = "height: 220px; width: 230px; border-radius:50%; margin-right:15px;" alt="">
    </a>
    <!-- END Avatar -->

    <!-- Personal -->
    <h1 class="h3 text-white font-w700 mb-10">{{ \Auth::user()->nama }}</h1>
 
    <!-- END Personal -->
<br>
    <!-- Actions -->
    <a href ="/updateakunadmin/{{ Auth::user()->id }}" class=" btn btn-rounded btn-hero btn-sm btn-alt-success mb-5">
    <i class="fa fa-pencil mr-5" ></i> Edit Profile Yuk!
    </a>
    <!-- END Actions -->
    </div>
    </div>
    </div>

    <!-- END User Info -->

    <!-- Main Content -->
    <!-- Projects -->
    <div class="content">
        
    <div class="block-content block-content">
    <table class="table table-borderless mt-40">    
                            <tbody>
                            <div class="block-header block-header-default">
                <h3 class="block-title">Informsi Pribadi</h3>
            </div>                   
            <tr class="table-danger">
                                    <td class="font-w600">Nama :</td>
                                    <td>{{ Auth::user()->nama }}</td>
                                </tr>
                                <tr class="table-danger">
                                    <td class="font-w600">E-Mail :</td>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                                <tr class="table-danger">
                                    <td class="font-w600">Password :</td>
                                    <td>{{ Auth::user()->password }}</td>
                                
                            
                            </tbody>
                        </table>
                        <!-- END Project Info -->
                    </div>
                    </div>

                   

    @endsection