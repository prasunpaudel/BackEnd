@extends('pages.template')
@section('content')
<div class="col-md-12 d-flex justify-content-center" style="padding:50px 0">
    <br><br<h1>Carts</h1><br>
</div>
<div id="card" style="padding:50px 0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <form action="GET">
                <div class="container ">
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-4">
                                    <div class="col-md-10">
                                      <label for="validationCustom01" class="form-label">First name</label>
                                      <input type="text" class="form-control" id="validationCustom01"  name="firstname" required>

                                    </div>
                                    <div class="col-md-10">
                                      <label for="validationCustom02" class="form-label">Last name</label>
                                      <input type="text" class="form-control" id="validationCustom02" name="secondname" required>

                                    </div>
                                    <div class="col-md-10">
                                        <label for="validationCustom2" class="form-label">E-mail</label>
                                      <div class="input-group has-validation">
                                        <input type="mail" class="form-control" id="validationCustomUsername" name="email" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                          E-Mail
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom05" class="form-label">Payment Method</label> <br>
                                        <input type="radio" name="paymethod">
                                        <label for="validationCustom05" class="form-label" id="paymethod" value="esewa">eSewa</label>
                                        <input type="radio" name="paymethod">
                                        <label for="validationCustom05" class="form-label" id="paymethod" value="cod">COD</label>
                                    </div>

                                    <div class="col-12 mt-2 ">
                                      <button class=" btn btn-primary" type="submit">Submit form</button>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <strong><h3><b>Item OverViews</b></h3></strong> <br>
                                    <div class="d-flex">
                                    @foreach($carts as $cart)
                                     @php
                                      $productinfo = App\Models\Product::where('id', $cart->product_id)->limit(1)->first();
                                        @endphp
                                        <img src="/site/uploads/AddProduct/{{$productinfo->photo}}" height="100px" width="100px" style="padding: 30px;"><br><br>
                                        {{$productinfo->title}}
                                            @endforeach
                                        </div>
                                    <strong><h3><b>Order Summary</b></h3></strong> <br>
                                    <table>
                                        <ul class="d-flex">
                                            <div class="paytable col-8">
                                                <div></div>
                                                <div>SubTotal : </div>
                                                <div>Shipping : </div>
                                                <div>Estimated Tax: </div>
                                                <div><strong>GrandTotal</strong> : </div>
                                            </div>
                                            <div class="paymentprice col-4">
                                                @php
                                                    $subtotal = 0; // Initialize the grand total variable
                                                    $shippingCharge = 200;
                                                    $taxPercentage = 0.20;
                                                    $grandTotal = 0;
                                                @endphp

                                                 @foreach ($carts as $tabledata)
                                                     @php
                                                         $productinfo = App\Models\Product::where('id', $tabledata->product_id)->first();
                                                             $itemCost = $tabledata->totalcost;
                                                            $subtotal += $itemCost;
                                                           
                                                    @endphp

                                                    @endforeach
                                                    @php
                                                     if ($subtotal > 1000) {
                                                        $shippingCharge = 0;
                                                     }
                                                     $taxAmount = $subtotal * $taxPercentage;
                                                     $grandTotal = $subtotal + $shippingCharge + $taxAmount;
                                                    @endphp

                                                    <div>{{ $subtotal }}</div>
                                                    <div>{{ $shippingCharge}}</div>
                                                    <div>{{$taxAmount}}</div>
                                                    <div><strong>{{$grandTotal}}</strong></div>

                                             </div>
                                         </ul>

                                    </table>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop