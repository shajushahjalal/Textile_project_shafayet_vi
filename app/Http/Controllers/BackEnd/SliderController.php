<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use App\FileUpload;
use DB;

class SliderController extends Controller
{
    use FileUpload;
    
    // Show All Slider
    public function show() {
        $sliders = Slider::all();
        return view('backEnd.slider.slider',['sliders'=>$sliders]);
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
            $data->url = $request->url;
            $data->position = $request->position;
            $data->publicationStatus = $request->publicationStatus;
            $data->image = $this->UploadImage($request, 'image', $this->sliderImageDir, 1000, 380, $data->image);
            $data->save();
            DB::commit();
            return redirect('slider')->with('success','Save Successfully');
        } catch (\Exception $ex) {
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
