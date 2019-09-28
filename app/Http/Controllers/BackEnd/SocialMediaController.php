<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SocialMedia;
use DB;

class SocialMediaController extends Controller
{
    //Show Index Page
    public function index() {
        $icons = SocialMedia::orderBy('position','ASC')->get();
        return view('backEnd.socialMedia.index',['icons'=>$icons]);
    }
    
    //Save Or Update Social Media info
    public function store(Request $request) {
        
        if($request->id == 0){
            $this->validate($request, [
                'icon' => 'required|unique:social_media',            
            ]);
            $icon = new SocialMedia();
        }else{
            $icon = SocialMedia::find($request->id);
        }        
        try{
            DB::beginTransaction();            
            $icon->icon = $request->icon;
            $icon->link = $request->link;
            $icon->position = $request->position;
            $icon->publicationStatus = $request->publicationStatus;
            $icon->save();
            DB::commit(); 
            return redirect('/social-media')->with('success','Add Successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return back()->with('error','Something Went Wrong');
        }
    }
    
    //Edit Social Media info
    public function edit($id) {
        $icons = SocialMedia::all();
        $data = SocialMedia::find($id);
        return view('backEnd.socialMedia.index',['icons'=>$icons,'data'=>$data]);
    }
    
    //Delete Social Media Icon
    public function delete($id) {
        $icon = SocialMedia::find($id);
        $icon->delete();
        return redirect()->back()->with('success','Icon Delete Successfully');
    }
}
