<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Shipping;
use App\Models\Order;
use Session;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;


class SiteController extends Controller

{
    public function getSite(Request $request, Product $product) {
        $import = ['products' => Product::where('status', 'show')->get()];
        return view('pages.home', $import);
    }
    public function getAddCart(Product $product){
        $code = Str::random(6);
        $qty = 1;
        if(Session::get('cartcode')){
            
            
            $cart = New Cart;
            $cart->product_id = $product->id;
            $cart->qty = $qty;
            $cart->cost = $product->cost;
            $cart->totalcost = $product->cost*$qty;
            $cart->code = Session::get('cartcode');
            $cart->save();
        }
        else{
            $cart = New cart;
            $cart->product_id = $product->id;
            $cart->qty = $qty;
            $cart->cost = $product->cost;
            $cart->totalcost = $product->cost*$qty;
            $cart->code = $code;
            Session::put('cartcode', $code);
            $cart->save();
        }
        return redirect()->route('getCart');
    }
    
    public function getCart(){
        if(Session::get('cartcode'))
        {
            $cartcode = Session::get('cartcode');
            $data =[
                'carts' => Cart::where('code', $cartcode)->get()
            ];
            return view('pages.cart', $data);
        }
        else{
            abort(404);
        }
    }
    
    public function shopping(){
        return redirect()->route('getCart');
    }
    
    public function getdeletecart(Cart $cart){
        if(Session::get('cartcode')==$cart->code){
            $cart->delete();
            return redirect()->route('getCart');
        }
        else{
            abort(404);
        }
    }
    public function checkout(Cart $cart){
        if(Session::get('cartcode')){
            $cartcode = Session::get('cartcode');
        $data =[
            'carts' => Cart::where('code', $cartcode)->get()
        ]; 
        $shipping=[
            'shippings'=>shipping::all()
        ];
        
        return view('pages.checkout',$data ,$shipping);
        }
        else{
            abort(404);
        }
    }
    public function PostCheckout(Request $request){
        if(Session::get('cartcode')){
            
            $totalamount = Session::get('subtotal');
            $shippingCharge = Shipping::where('id', $request->input('state'))->value('charge');
            $taxAmount = Session::get('taxAmount');
            $grandTotal = $totalamount+$shippingCharge+$taxAmount;
            $order = New Order;
            $firstName = $request->input('firstname');
            $lastName = $request->input('lastname');
            $order->name = $firstName . ' ' . $lastName;
            $order->email = $request->input('email');
            $order->state_id = $request->input('state');
                $order->city = $request->input('city');
                $order->payment_type = $request->input('paymethod');
                if ($order->payment_type === 'esewa') {
                    $order->payment_status = 'y'; // Assuming 'y' means paid for eSewa
                } elseif ($order->payment_type === 'cod') {
                    $order->payment_status = 'n'; // Assuming 'n' means not paid for COD
                }
                $order->cartcode = Session::get('cartcode');
                $order->zipcode = $request->input('zipcode');
                $order->totalamount = $totalamount;
                $order->shippingamount = $shippingCharge;
                $order->taxAmount = $taxAmount;
                $order->grandTotal = $grandTotal;
                $order->save();
                return redirect()->route('conformOrder', ['orderId' => $order->id]);
    }
}

public function conformOrder($orderId){
    // return $orderId;



    if(Session::get('cartcode')){
        $cartcode = Session::get('cartcode');
    $data =[
        // 'order' => Order::where('cartcode', $cartcode)->latest()->get()
        'order' => Order::where('id', $orderId)->first(),
    ];
   return view('payment.form',$data);
}
else{
    return hello;
}
}

public function payment(){

}
}