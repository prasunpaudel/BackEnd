<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;

class CatagoryController extends Controller
{
    public function getAddcatagory()
    {
        return view('pages.catagory');
    }
    public function postAddcatagory(Request $request)
    {
        // dd('hello');
        // dd($request->title);
        $title=$request->title;
        $photo=$request->photo;
        $detail=$request->detail;
        if($photo)
        {
            // generate unique name for photos
        $time=md5(time()).'.'.$photo->getClientOriginalExtension();
        // dd($time);
        // to move photo into folder 
        $photo->move('site/uploads/catagory/',$time);
        }
        else
        {
            $time=null;
        }
        $abc=new Catagory;
        $abc->title=$title;
        $abc->photo=$time;
        // dd($photo);
        $abc->detail=$detail;
        $abc->save();
        return redirect()->route('getmanagecatagory')->with('success','catagory added sucessfully');
    }
    public function getmanageCatagory(){
        $import=['catagories'=> Catagory::paginate(5)];
        return view('pages.managecatagory', $import);
    }
    public function index(){
        return view('pages.managecatagory',['catagories'=> Catagory::all()]);
    }
    public function getdeletecatagory(catagory $catagory){
        $catagory->delete();
        return redirect()->route('getmanagecatagory');
    }
    public function geteditcatagory(catagory $catagory){
        $data=['catagory'=>$catagory];
       return view('pages.CatagoryEdit',$data);
    }
    public function posteditcatagory(request $request , catagory $catagory){
            $photo = $request->file('photo');
            if($photo){
    
                $time=md5(time()).'.'.$photo->getClientOriginalExtension();
                $photo->move('site/uploads/catagory/',$time);
    
                $catagory->title = $request->input('title');
                $catagory->detail = $request->input('detail');
                $catagory->photo = $time;
                $catagory->save();
            }
            else{
                $catagory->title = $request->input('title');
                $catagory->detail = $request->input('detail');
                $catagory->save();
            }
            return redirect()->route('getmanagecatagory');
        }
}