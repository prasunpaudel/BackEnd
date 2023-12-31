<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="ManageShipping"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="ManageShipping"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Manage Shipping</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            state</th>
                                            
                                            <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            charge</th>
                                            <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            status</th>
                                        
                                            <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            created at</th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Shipping as $Shipping)
                                        <tr>
                                            <td>
                                                    <div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{$Shipping ->state }}</h6>
                                                        </div>
                                                    </div>
                                            </td>
                                            <td>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$Shipping ->charge }}</h6>
                                                    </div>
                                            </td>      
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{$Shipping ->status }}</span>
                                            </td>
                                            <td>
                                                    <div class=" ">
                                                        <h6 class="mb-0 text-sm">{{$Shipping ->created_at}}</h6>
                                                        
                                                    </div>
                                            </td>
                                            <td>
                                            <a href="{{ route('EditShipping',$Shipping->id) }} "><button class="bg-info text-light btn-sm"><b><i class="material-icons">edit</i></b></button></a>
                                            <a href="{{ route('DeleteShipping',$Shipping->id)  }}"><button class="bg-info text-light btn-sm"><b><i class="material-icons">delete</i></b></button></a>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $Shipping->links() }}
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
