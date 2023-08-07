<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Cart;
use Session;


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
            $cart->save();
            Session::put('cartcode', $code);
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
        if(Session::get('cartcode')==$cart->code){
            $cartcode = Session::get('cartcode');
            $data =[
                'carts' => Cart::where('code', $cartcode)->get()
            ];
            return view('pages.checkout',$data);
        }
        else{
            abort(404);
        }
    }
    public function shipping(){
        return view('pages.shipping');
    }
    
}
