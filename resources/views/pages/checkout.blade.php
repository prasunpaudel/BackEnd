@extends('pages.template')
@section('content')
<div id="card" style="padding:50px 0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br /> <br />
                @foreach ($carts as $tabledata)
                @endforeach
                <a  href="{{route('getCart')}}" class="text-secondary">Carts</a> >
                <a  href="{{route('checkout', $tabledata->id)}}" > checkout</a> >
                 <br> <br>
                <h3>Billing Adderess</h3><br>
                <form action="{{route('PostCheckout')}}" method="POST">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                          <div class="col-md-4">
                            <label  >First name</label>
                            <input type="text"    name="firstname" required>
                          
                          </div>
                          <div class="col-md-4">
                            <label  >Last name</label>
                            <input type="text"   name="lastname" required>
                            
                          </div>
                          <div class="col-md-4">
                              <label  >E-mail</label>
                            <div>
                              <input type="mail"   name="email"  required>
                             
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label  >State</label>
                            <select class="shipping1 form-select"  name="state" required>
                              <option value="">Select Your State</option>
                              @foreach($shippings as $crg)
                              <option value="{{$crg->id}}" data-charge="{{$crg->charge}}">{{$crg->state}} @NRS {{$crg->charge}}</option>
                              @endforeach
                              
                            </select>
                          </div>
                          <div class="col-md-6 mt-2">
                            <label  >City</label> <br>
                            <input type="text"   name="city" required>
                           
                          </div>
                          <div class="col-md-3">
                            <label  >Zip</label>
                            <input type="text"  name="zipcode"  required>
                            
                          </div>
                          <div class="cocl-md-3">
                              <label  >Payment Method</label> <br>
                              <input type="radio" value="esewa" name="paymethod">
                              <label   id="paymethod" >eSewa</label>
                              <input type="radio" value="cod" name="paymethod">
                              <label   id="paymethod" >COD</label>
                          </div>
                          <div class="col-12 mt-2 d-flex justify-content-end">
                            <button class=" btn btn-primary" type="submit">Order Now</button>
                          </div>
                        </div>
                                
                      </form>
                      <div class="col-md-5">
                               @foreach ($carts as $tabledata)
                              @endforeach
                                <strong><h3><b>Item OverViews</b></h3></strong> <br>
                                <div class="d-flex row mb-10">
                                    @foreach ($carts as $tabledata)
                                      @php
                                        $productinfo = App\Models\Product::where('id', $tabledata->product_id)->first();   
                                      @endphp
                                      <img src="/site/uploads/AddProduct/{{$productinfo->photo}}" alt="photo"
                                                  class="m-2 col-3"><img src="" alt="" srcset="">
                                      @endforeach
                                  </div>
                                              
                                <table>
                                  <strong><h3><b>Order Summary</b></h3></strong> <br>
                                    <ul class="d-flex">
                                    <div class="paytable col-md-10">
                                        
                                          <div>SubTotal : </div>
                                          <div>Shipping : </div>
                                          <div>Estimated Tax(13%): </div>
                                          <div><strong>GrandTotal</strong> : </div>
                                    </div>
                                    <div class="paymentprice ">
                                        @php
                                          $subtotal = 0; // Initialize the grand total variable
                                          $shippingCharge = 0;
                                          $taxPercentage = 0.13;
                                          $grandTotal = 0;
                                        @endphp
                          
                                       @foreach ($carts as $tabledata)
                                          @php
                                              $productinfo = App\Models\Product::where('id', $tabledata->product_id)->first();
                                              $itemCost = $tabledata->totalcost;
                                              $subtotal = $itemCost;                                                           
                                          @endphp
                                        @endforeach
                                                <div>{{ $subtotal }}</div>
                                                
                                                <div class="shipping-charge">{{ $shippingCharge }}</div>
                                                @php
                                                    $taxAmount = $subtotal * $taxPercentage;
                                                    $grandTotal = $subtotal + $shippingCharge + $taxAmount;
                                                @endphp
                                                <span class="tax-amount">{{ $taxAmount }}</span><br>
                                                <strong><span class="grand-total">{{ $grandTotal }}</span></strong>
                                                 @php
                                                 session(['subtotal' => $subtotal]);
                                                 session(['shippingCharge' => $shippingCharge]);
                                                 session(['taxAmount' => $taxAmount]);
                                                 session(['grandTotal' => $grandTotal]);
                                                 @endphp
                                              </div>
                                              </ul>
                                          </div>
                                          
                          
                                </table>
                            </div>
                            
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
                  </div>
                </div> 
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.shipping1').ready(function() {
        $('.shipping1').change(function() {
            var selectedShippingCharge = parseFloat($(this).find(':selected').data('charge'));
            $('.shipping-charge').text(selectedShippingCharge);

            // Calculate and update tax amount and grand total
            var subtotal = {{ $subtotal }};
            var taxPercentage = {{ $taxPercentage }};
            var taxAmount = subtotal * taxPercentage;
            var grandTotal = subtotal + selectedShippingCharge + taxAmount;

            $('.tax-amount').text(taxAmount.toFixed(2));
            $('.grand-total').text(grandTotal.toFixed(2));
        });
    });
</script>
@stop