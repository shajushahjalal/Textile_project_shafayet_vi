<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Seo;
use App\Http\Controllers\Controller;
use DB;

class SeoController extends Controller
{
    // Show All Seo Content
    public function show() {
        $data = Seo::first();
        return view('backEnd.seo.manageSeo',['data'=>$data]);
    }
    
    // Store or save Seo Information
    public function store(Request $request) {
        try{
            DB::beginTransaction();
                if($request->id == 0){
                $seo = new Seo();
            }else{
                $seo = Seo::find($request->id);
            }        
            $seo->seo = $this->RemoveContent($request->seo);
            $seo->save();
            DB::commit();
            return redirect()->back()->with('success','Save Successfully');            
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('error','Something Went Wrong');
        }
    }
    
    protected function RemoveContent($text) {
        return str_replace('<br>', '', str_replace('</p>','', str_replace('<p>','', $text)));
    }
}
