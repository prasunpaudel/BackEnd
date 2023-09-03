@extends('pages.template')
@section('content')
<body>
    <section class="vh-100" style="background-color: #35558a;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100 text-center">
      <div class="col">
        

        <!-- Modal -->
        
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-start text-black p-4">
                <h5 class="modal-title text-uppercase mb-5" id="exampleModalLabel"></h5>
                <h4 class="mb-5" style="color: #35558a;">Do you want to conform your order</h4>
                <p class="mb-0" style="color: #35558a;">Payment summary</p>
                <hr class="mt-2 mb-4"
                  style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">

                <div class="d-flex justify-content-between">
                    <p class="fw-bold mb-0">Name</p>
                    <p class="text-muted mb-0">{{ $order->name }}</p>
                </div>
                <div class="d-flex justify-content-between">
                  <p class="small mb-0">Email</p>
                  <p class="small mb-0">{{ $order->email }}</p>
                </div>

                <div class="d-flex justify-content-between pb-1">
                  <p class="small">state id</p>
                  <p class="small">{{ $order->state_id }}</p>
                </div>
                <div class="d-flex justify-content-between pb-1">
                  <p class="small">City</p>
                  <p class="small">{{ $order->city }}</p>
                </div>
                <div class="d-flex justify-content-between pb-1">
                  <p class="small">Payment Type</p>
                  <p class="small">{{ $order->payment_type }}</p>
                </div><div class="d-flex justify-content-between pb-1">
                  <p class="small">Product Amount</p>
                  <p class="small">NRP.{{ $order->totalamount }}</p>
                </div><div class="d-flex justify-content-between pb-1">
                  <p class="small">Shipping Charge</p>
                  <p class="small">NRP.{{ $order->shippingamount }}</p>
                </div><div class="d-flex justify-content-between pb-1">
                  <p class="small">Tax Amount</p>
                  <p class="small">NRP.{{ $order->taxAmount }}</p>
                </div><div class="d-flex justify-content-between pb-1">
                  <p class="small">Grand Total</p>
                  <p class="small">NRP.{{ $order->grandtotal }}</p>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>
  </div>
</section>
    <form action="https://uat.esewa.com.np/epay/main" method="POST">
         <input value="{{ $order->totalamount +$order->taxAmount +0+$order->shippingamount}}" name="tAmt" type="hidden"> {{-- amt+txamt+psc+pdc --}}
        <input value="{{ $order->totalamount }}" name="amt" type="hidden"> {{-- product amount --}}
        <input value="{{ $order->taxAmount }}" name="txAmt" type="hidden"> {{-- Tax amount --}}
        <input value="0" name="psc" type="hidden"> {{-- service charge amount --}}
        <input value="{{ $order->shippingamount }}" name="pdc" type="hidden"> {{-- delivery charge amount --}}
        <input value="EPAYTEST" name="scd" type="hidden"> {{-- merchant code which is provided by esewa --}}
        <input value="0987654321234567890" name="pid" type="hidden">
        <input value="http://localhost:8000/PostCheckout/email" type="hidden" name="su">
        <input value="http://localhost:8000/payment/fail" type="hidden" name="fu">
        <div class="modal-footer d-flex justify-content-center border-top-0 py-4">
            <button type="submit" class="btn btn-primary btn-lg mb-1" style="background-color: #35558a;">
              Pay Now
            </button>
          </div>
        </form>
</body>
@stop