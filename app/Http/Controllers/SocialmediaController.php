<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SocialmediaController extends Controller
{
    public function getsocialMedia(){
        return view('pages.socialmedia');
    }
    public function postsocialMedia(Request $request){
         // Validate the request data
    $validator = Validator::make($request->all(), [
        
        // 'icon' => 'image|mimes:png',
        
    ]);

    // Check if the validation fails
    if ($validator->fails()) {
        // dd('only png image');
        return redirect()->back()->withErrors($validator)->withInput();
    }
        $name=$request->name;
        $icon=$request->icon;
        $url=$request->link;
        if($icon){
            //generate unique name for photo
            $time=md5(time()).'.'.$icon->getClientOriginalExtension();
            // to move photo into folder
            $icon->move('site/uploads/socialmedia/',$time);
            $socialmedia=new SocialMedia;
            $socialmedia->name    =   $name;
            $socialmedia->url     =   $url;
             $socialmedia->icon   =   $time;
             // dd($photo);
        }
        else{
             $time=Null;
        }
        $socialmedia->save();
        // dd($time);
    
        return redirect()->route('getmanagesocialmedia');
    }
    public function getmanagesocialmedia(){
        $import=['socialmedia'=> SocialMedia::paginate(5)];
        return view('pages.ManageSocialMedia', $import);
    }
    public function getdeletemedia(socialmedia $socialmedia){
        $socialmedia->delete();
        return redirect()->route('getmanagesocialmedia');
    }
    public function geteditmedia(socialmedia $socialmedia){
        $data=['socialmedia'=>$socialmedia];
       return view('pages.MediaEdit',$data);
    }
    public function posteditmedia(request $request , socialmedia $socialmedia){
            $photo = $request->file('photo');
            if($photo){
    
                $time=md5(time()).'.'.$photo->getClientOriginalExtension();
                $icon->move('site/uploads/socialmedia/',$time);
                $socialmedia->name = $request->input('name');
                $socialmedia->url = $request->input('url');
                $socialmedia->icon = $request->input('icon');
                $socialmedia->save();
            }
            else{
                $socialmedia->name = $request->input('name');
                $socialmedia->url = $request->input('url');
                $socialmedia->save();
            }
           
            return redirect()->route('getmanagesocialmedia');    
        }
}