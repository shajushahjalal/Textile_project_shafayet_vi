<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use App\SliderVideo;
use DB;
use Exception;

class SliderController extends Controller
{
    
    // Show All Slider
    public function show() {
        $sliders = Slider::all();
        $sliderVideo = SliderVideo::first();
        return view('backEnd.slider.slider',['sliders'=>$sliders,'sliderVideo'=>$sliderVideo]);
    }
    
    //Save Slider
    public function store(Request $request) {
        if(empty($request->id)){
            $data = new Slider();
        }else{
            $data = Slider::find($request->id);
        }
        try {
            DB::beginTransaction();
            $data->text = $request->text;
            $data->position = $request->position;
            $data->image = $this->UploadImage($request, 'image', $this->sliderDir, '1000', null, $data->image);
            $data->publicationStatus = $request->publicationStatus;            
            $data->save();
            DB::commit();
            return redirect('slider')->with('success','Save Successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return back()->with('error','Something went Wrong');
        }        
    }

    public function addVideo(Request $request){
        if(empty($request->id)){
            $data = new SliderVideo();
        }else{
            $data = SliderVideo::find($request->id);
        }
        try{
            DB::beginTransaction();
            $data->video = $this->UploadVideo($request,'video',$this->sliderDir,$data->video);
            $data->save();
            DB::commit();
            return redirect('slider')->with('success','Video Add Successfully');
        }catch(Exception $ex){
            DB::rollback();
            return back()->with('error','Something went Wrong');
        }
    }
    
    // Edit Slider
    public function edit($id) {
        $sliders = Slider::all();
        $slider = Slider::find($id);
        return view('backEnd.slider.slider',['sliders'=>$sliders,'slider'=>$slider]);
    }
    
    // Delete Slider
    public function delete($id) {        
        $slider = Slider::find($id);
        $this->RemoveFile($slider->image);
        $slider->delete();
        return redirect('slider')->with('success','Save Successfully');
    }
}
