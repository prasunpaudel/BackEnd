<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping;

class ShippingController extends Controller
{
   public function AddShipping() { 
    return view('pages.shipping'); 
}
public function PostAddShipping(Request $request){

    $state=$request->state;
    $charge= $request->charge;
    $status=$request->status;
    
    $shippings= new Shipping;
    $shippings->State=$state;
    $shippings->Charge=$charge;
    $shippings->Status=$status;
    $shippings->save();
    return redirect()->route('AddShipping');
}


public function ManageShipping(){
    $import=['Shipping'=> Shipping::paginate(7)];
    return view('pages.ManageShipping', $import);
}
public function DeleteShipping(Shipping $Shipping){
    $Shipping->delete();
    return redirect()->route('ManageShipping');
}
public function EditShipping(Shipping $Shipping){
    $data=['Shipping'=>$Shipping];
   return view('pages.EditShipping',$data);
}
public function PostEditShipping(request $request , Shipping $Shipping){
        
            $Shipping->state = $request->input('state');
            $Shipping->charge = $request->input('charge');
            $Shipping->status = $request->input('status');
            $Shipping->save();

        return redirect()->route('ManageShipping');    
    }
}
