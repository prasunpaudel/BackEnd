<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="ManageProduct"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="ManageProduct"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">products</h6>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                            <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">
                                                    </th>
                                                    <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">
                                                    ProductTitle</th>
                                                <th
                                                    class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                                    Catagories</th>
                                                    <th
                                                    class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Productcost</th>
                                                
                                                    <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Details</th>
                                                    <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Created-at</th>
                                                    
                                                    <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">
                                                    </th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $pro)
                                            @if($pro->status=='hide')
                                            <tr>
                                                <td>
                                                        <div>
                                                            <img src="/site/uploads/AddProduct/{{$pro->photo}}"
                                                            class=" img-fluid w-100 img-thumbnail rounded mx-auto d-block"
                                                            style="max-width:150px; 100px; padding:0; height: 150px;"
                                                            alt="user1">
                                                        </div>
                                                </td>
                                                <td>
                                                        <div class="d-flex flex-column  text-center">
                                                            <h6 class="mb-0 text-sm">{{$pro ->title }}</h6>
                                                        </div>
                                                </td> 
                                                <td>
                                                <div class="d-flex flex-column text-center">
                                                            <h6 class="mb-0 text-sm">{{$pro ->catagory }}</h6>
                                                        </div>
                                                </td> 
                                                <td>
                                                <div class="d-flex flex-column text-center">
                                                            <h6 class="mb-0 text-sm">{{$pro ->cost }}</h6>
                                                        </div>
                                                </td>    
                                                <td> 
                                                <div class="d-flex flex-column text-center">
                                                            <h6 class="mb-0 text-sm">{{$pro ->detail }}</h6>
                                                        </div>
                                                </td>   
                                                <td>
                                                <div class="d-flex flex-column text-center">
                                                            <h6 class="mb-0 text-sm">{{$pro ->created_at }}</h6>
                                                        </div>
                                                </td>  
                                                <td>
                                                    <a href="{{ route('geteditproduct',$pro->id) }} "><button class="bg-info text-light btn-sm"><b><i class="material-icons">edit</i></b></button></a>
                                                    <a href="{{ route('getdeleteproduct',$pro->id)  }}"><button class="bg-info text-light btn-sm"><b><i class="material-icons">delete</i></b></button></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $products->links() }}
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
