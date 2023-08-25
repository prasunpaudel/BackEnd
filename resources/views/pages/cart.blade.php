@extends('pages.template')
@section('content')
<section class="h-100" style="background-color: transparent!important;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-11">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
          <div>
            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="" class="text-body">price <i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
          </div>
        </div>
        @foreach($carts as $cart)
        @php
            $productinfo = App\Models\Product::where('id', $cart->product_id)->limit(1)->first();
        @endphp
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-3 col-lg-3 col-xl-3 d-flex align-items-center" style="height:100px">
              <img src="/site/uploads/AddProduct/{{$productinfo->photo}}" height="150px" width="150px" style="padding: 30px;">
              </div>
              <div class="col-md-2 col-lg-2 col-xl-2">
                <b>{{ $productinfo->title }}</b>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 d-flex">
              X  {{$cart->qty}}
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1">
                <h5 class="mb-0">{{$cart->cost * $cart->qty}}</h5>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="{{ route('getdeletecart',$cart->id)  }}" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        

        <div class="card">
          <div class="card-body">
            <a href="{{route('checkout')}}"><button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button></a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
@stop