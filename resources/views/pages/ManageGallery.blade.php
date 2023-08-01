<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="ManageGallery"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="ManageGallery"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">ManageGallery</h6>
                                </div>
                            </div> 
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                <style>
    .message{
    display: flex;
    justify-content:center;
}
 /* Base alert styles */
.alert {
    height:50px;
    width: 800px;
    padding: 10px;
  border-radius: 4px;
  margin-bottom: 10px;
}

/* Success alert styles */
.alert-success {
  background-color: #d4edda; /* Light green */
  border-color: #c3e6cb; /* Light green border */
  color: #155724; /* Dark green text */
}

/* Close button styles */
.close {
  float: right;
  font-size: 20px;
  font-weight: bold;
  line-height: 20px;
  color: #000;
  text-shadow: 0 1px 0 #fff;
  opacity: 0.5;
}

.close:hover {
  color: #000;
  text-decoration: none;
  opacity: 0.75;
}
</style>
@if(session('success'))
<div class="message">
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!
    
  </strong> Your gallery was added successfully.
</div>
</div>   
  @endif
                                <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        photo</th>
                                                <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Title</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    created at</th>
                                                 <th   
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($gallery as $gal)
                                            <tr>
                                                <td>
                                                <div>
                                                            <img src="/site/uploads/gallery/{{$gal->photo}}"
                                                            class=" img-fluid w-100 img-thumbnail rounded mx-auto "
                                                            style="max-width:150px; 100px; padding:0; height: 150px;"
                                                            alt="user1">
                                                        </div>
                                                </td> 
                                                <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{$gal ->title }}</h6>
                                                        </div>
                                                </td>     
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        
                                                        <div class=" ">
                                                            <h6 class="mb-0 text-sm">{{$gal->created_at}}</h6>
                                                            
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                <a href="{{ route('geteditgallery',$gal->id) }} "><button class="bg-info text-light btn-sm"><b><i class="material-icons">edit</i></b></button></a>
                                                <a href="{{ route('getdeletegallery',$gal->id)  }}"><button class="bg-info text-light btn-sm"><b><i class="material-icons">delete</i></b></button></a>
                                            </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $gallery->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
