<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;

class GalleryController extends Controller
{
    public function getAddGallery()
    {
        return view('pages.Gallery');
    }
    public function postAddGallery(Request $request)
    {
        // dd('hello');
        // dd($request->title);
        $title=$request->title;
        $photo=$request->photo;
        if($photo)
        {
            // generate unique name for photos
        $time=md5(time()).'.'.$photo->getClientOriginalExtension();
        // dd($time);
        // to move photo into folder 
        $photo->move('site/uploads/Gallery/',$time);
        }
        else
        {
            $time=null;
        }
        $abc=new Gallery;
        $abc->title=$title;
        $abc->photo=$time;
        $abc->save();
        return redirect()->route('getmanagegallery')->with('success','gallery added sucessfully');
    }
    public function getmanagegallery(){
        $import=['gallery'=> Gallery::paginate(5)];
        return view('pages.ManageGallery', $import);
    }
    public function getdeletegallery(gallery $gallery){
        $gallery->delete();
        return redirect()->route('getmanagegallery');
    }
    public function geteditgallery(gallery $gallery){
        $data=['gallery'=>$gallery];
       return view('pages.GalleryEdit',$data);
    }
    public function posteditgallery(request $request , gallery $gallery){
        $photo = $request->file('photo');
            if($photo){
    
                $time=md5(time()).'.'.$photo->getClientOriginalExtension();
                $photo->move('site/uploads/gallery/',$time);
    
                $gallery->title = $request->input('title');
                $gallery->photo = $time;
                $gallery->save();
            }
            else{
                $gallery->title = $request->input('title');
                $gallery->save();
            }
            return redirect()->route('getmanagegallery');    
        }
}
