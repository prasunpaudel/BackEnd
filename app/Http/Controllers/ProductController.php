<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getAddProduct()
    {
        return view('pages.AddProduct');
    }
    public function postAddProduct(Request $request)
    {
        // dd('hello');
        $catagory=$request->catagory;
        $title=$request->title;
        $cost=$request->cost;
        $detail=$request->detail; 

        $image=$request->image;
        $status=$request->status;
        if($image)
        {
        $time=md5(time()).'.'.$image->getClientOriginalExtension();
        $image->move('site/uploads/AddProduct/',$time);
        }
        else
        {
            $time=null;
        }
        $abc=new Product;
        $abc->catagory=$catagory;
        $abc->title=$title;
        $abc->cost=$cost;
        $abc->detail=$detail;

        $abc->photo=$time;
        $abc->status=$status;
        // dd($time);
        $abc->save();
        return redirect()->route('getmanageproduct')->with('success','product added sucessfully');
    }
    public function getmanageproduct(){
        $import=['products'=> product::paginate(5)];
        return view('pages.ManageProduct', $import);
    }
    public function getdeleteproduct(product $product){
        $product->delete();
        return redirect()->route('getmanageproduct');
    }
    public function geteditproduct(product $product){
        $data=['product'=>$product];
       return view('pages.ProductEdit',$data);
    }
    public function posteditproduct(request $request , product $product){
            $photo = $request->file('photo');
            if($photo){
    
                $time=md5(time()).'.'.$photo->getClientOriginalExtension();
                $photo->move('site/uploads/product/',$time);
    
                $product->title = $request->input('title');
                $product->detail = $request->input('detail');
                $product->photo = $time;
                $product->catagory=$request->input('catagory');
                $prduct->cost=$cost;
                $product->save();
            }
            else{
                $product->title = $request->input('title');
                $product->detail = $request->input('detail');
                $product->catagory=$request->input('catagory');
                $product->cost=$request->input('cost');
                $product->save();
            }
           
            return redirect()->route('getmanageproduct');    
        }
}
