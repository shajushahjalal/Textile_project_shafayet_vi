<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FooterMenu;
use Illuminate\Support\Facades\Validator;

class FooterMenuController extends Controller
{
    // Index page
    public function index(){
        $data = FooterMenu::orderBy('position','ASC')->get();
        return view('backEnd.footerMenu.index',['data'=>$data]);
    }

    // Menu Create Page
    public function create(){
        $data = FooterMenu::orderBy('position','ASC')->get();
        return view('backEnd.footerMenu.create');
    }

    // Store content
    public function store(Request $request){
        if( empty($request->id) ){
            $validator = Validator::make($request->all(),[
                'menuName' => 'required|unique:footer_menus'
            ]);
            if($validator->fails() ){
                return back()->with('error','Validation error');
            }
            $data = new FooterMenu();
        }else{
            $data = FooterMenu::find($request->id);
        }
        $data->menuName = $request->menuName;
        $data->image = $this->UploadImage($request,'image',$this->contentImage,null,420,$data->image);
        $data->publicationStatus = $request->publicationStatus;
        $data->show = $request->show;
        $data->position = $request->position;
        $data->content = $request->content;
        $data->save();
        return redirect('footer-menu')->with('success','Add Successfully');
    }

     // Menu edite
     public function edit($id){
        $data = FooterMenu::find($id);
        return view('backEnd.footerMenu.create',['data' => $data]);
    }

}
