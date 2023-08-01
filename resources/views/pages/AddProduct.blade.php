<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="AddProduct"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='AddProduct'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <!-- <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('assets') }}/img/bruce-mars.jpg" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div> -->
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Add Product
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    </div>
                </div>
                <div class="card card-plain h-100">
                    
                    <div class="card-body p-3">
                        @if (session('status'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10"
                                    data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        @if (Session::has('demo'))
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('demo') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                        @endif
                        <form method='POST' action="{{ route('postAddProduct') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Catagory</label>
                                    <input type="text" name="catagory" class="form-control border border-2 p-2" >
                                    @error('catagory')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Product Title</label>
                                    <input type="text" name="title" class="form-control border border-2 p-2" ></input>
                                    @error('title')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Product Cost</label>
                                    <input type="number" name="cost" class="form-control border border-2 p-2"></input>
                                    @error('cost')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                   
                                </div>
                                <div class="mb-3 col-md-6">
                                        <label class="form-label">Product image</label>
                                        <input type="file" name="image" class="form-control border border-2 p-2" >
                                        @error('image')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                    </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Product Details</label>
                                    <textarea type="text" name="detail" class="form-control border border-2 p-2" placeholder="say something about your product"></textarea>
                                    @error('detail')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Product status :  </label>

                                    <input type="radio" name="status" value="show">Show</input>
                                    <input type="radio" name="status" value="hide">hide</input>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Save</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
