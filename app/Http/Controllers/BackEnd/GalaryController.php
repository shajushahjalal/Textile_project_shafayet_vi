<?php

namespace App\Http\Controllers\BackEnd;

use App\GalaryContent;
use App\GalaryMenu;
use App\GalarySubMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Yajra\DataTables\Facades\DataTables;

class GalaryController extends Controller
{
    protected $index; 
    // Galary Menu Index
    public function galaryMenuIndex(Request $request){
        if($request->ajax()){
            $this->index = 0;
            $data = GalaryMenu::orderBy('position','ASC')->get();
            return DataTables::of($data)
            ->addColumn('index',function(){
                $this->index++;
                return $this->index;
            })
            ->editColumn('publicationStatus',function($row){
                return $row->publicationStatus == 1?'published':unpublished; 
            })
            ->addColumn('action',function($row){
                $li = '<a href="'.url('galary/menu/edit/'.$row->id).'" class="ajax-click-page btn btn-info btn-sm">Edit</a> &nbsp; ';
                $li .= '<a href="'.url('galary/menu/delete/'.$row->id).'" class="ajax-click btn btn-danger btn-sm" >Delete</a>';
                return $li;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('backEnd.galary.galaryMenu');
    }

    // Create Galary Menu
    public function createMenu(){
        return view('backEnd.galary.partial.createMenu');
    }

    // Save Menu Info
    public function storeMenu(Request $request){
        try{
            if($request->id == 0){
                $data =  new GalaryMenu();
            }else{
                $data =  GalaryMenu::findOrFail($request->id);
            }
            $data->menuName = $request->menuName;
            $data->position = $request->position;
            $data->publicationStatus = $request->publicationStatus;
            $data->save();
            $output = ['status'=>'success','message'=>'Data Save Successfully','table'=> 1,'modal'=>1];
            return response()->json($output);
        }catch(Exception $ex){
            $output = ['status'=>'error','message'=>'Something went Wrong','table'=> 1,'modal'=>1];
            return response()->json($output);
        }        
    }

    // Edit Galary Menu Info
    public function editMenu($id){
        $data = GalaryMenu::findOrFail($id);
        return view('backEnd.galary.partial.createMenu',['data' => $data]);
    }

    // Edit Galary Menu Info
    public function deleteMenu($id){
        $data = GalaryMenu::findOrFail($id);
        $data->delete();
        $output = ['status'=>'success','message'=>'Data Delete Successfully','table'=> 1];
        return response()->json($output);
        
    }

    /************************************************************************************************
     * Galary Content
     * **********************************************************************************************
     */

    // Galary Content Index Page
    public function galaryContentIndex(Request $request){
        if($request->ajax()){
            $data = GalaryContent::all();
            return DataTables::of($data)
            ->addColumn('index',function(){
                $this->index++;
                return $this->index;
            })
            ->addColumn('menuName',function($row){
                return $row->galary->menuName; 
            })
            ->addColumn('subMenuName',function($row){
                return $row->subMenu->subMenuName; 
            })
            ->addColumn('action',function($row){
                $li = '<a href="'.url('galary/content/edit/'.$row->id).'" class="ajax-click-page btn btn-info btn-sm">Edit</a> &nbsp; ';
                $li .= '<a href="'.url('galary/content/delete/'.$row->id).'" class="ajax-click btn btn-danger btn-sm" >Delete</a>';
                return $li;
            })
            ->editColumn('image',function($row){
                return '<img src="'.asset($row->image).'" width="80" >';
            })
            ->rawColumns(['action','image'])
            ->make(true);
        }
        return view('backEnd.galary.galaryContent');
    }

    // Show Galary Content Add Page
    public function galaryContentCreate(){
        $galaryMenus = GalaryMenu::all();
        return view('backEnd.galary.partial.createGalaryContent',['galaryMenus' => $galaryMenus]);
    } 

    // Store Galary content
    public function storeContentCreate(Request $request){
        try{
            if($request->id == 0){
                $data =  new GalaryContent();
            }else{
                $data =  GalaryContent::findOrFail($request->id);
            }
            $data->galary_id = $request->galary_id;
            $data->galary_submenu_id = $request->galary_submenu_id;
            $data->link = $request->link;
            $data->image = $this->UploadImage($request, 'image', $this->galaryImage, null, 300, $data->image);
            $data->save();
            $output = ['status'=>'success','message'=>'Data Save Successfully','table'=> 1,'modal'=>1];
            return response()->json($output);
        }catch(Exception $e){
            $output = ['status'=>'error','message'=> $e->getMessage(),'table'=> 1,'modal'=>1];
            return response()->json($output);
        } 
    }

    // Edit Galary Content
    public function editContent($id){
        $prams['data'] = GalaryContent::findOrFail($id);
        $prams['galaryMenus'] = GalaryMenu::all();
        return view('backEnd.galary.partial.createGalaryContent',$prams);
    }

    //Delete Galary Content
    public function deleteContent($id){
        $data = GalaryContent::findOrFail($id);
        $this->RemoveFile($data->image);
        $data->delete();
        $output = ['status'=>'success','message'=>'Data Delete Successfully','table'=> 1];
        return response()->json($output);
    }

    // get Galary Menu List
    public function getMenuList(Request $request){
        $menus = GalarySubMenu::where('galary_menu_id',$request->id)->get();
        $option = '<option value="">Select Menu</option>';
        foreach($menus as $menu){
            $option .= '<option value="'.$menu->id.'">'. $menu->subMenuName .'</option>';
        }
        return  $option;
    }

    /**
     * ************************************************************************************************
     * Galary Sub Menu Section
     * ************************************************************************************************
     */
    public function galarySubMenuIndex(Request $request){
        if($request->ajax()){
            $this->index = 0;
            $data = GalarySubMenu::orderBy('position','ASC')->get();
            return DataTables::of($data)
            ->addColumn('index',function(){
                $this->index++;
                return $this->index;
            })->addColumn('menuName',function($row){
                return $row->galaryMenu->menuName;
            })
            ->editColumn('publicationStatus',function($row){
                return $row->publicationStatus == 1?'published':unpublished; 
            })
            ->addColumn('action',function($row){
                $li = '<a href="'.url('galary/sub-menu/edit/'.$row->id).'" class="ajax-click-page btn btn-info btn-sm">Edit</a> &nbsp; ';
                $li .= '<a href="'.url('galary/sub-menu/delete/'.$row->id).'" class="ajax-click btn btn-danger btn-sm" >Delete</a>';
                return $li;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('backEnd.galary.galarySubMenu');
    }

    /**
     * Create Galary SubMenu
     */
    public function createSubMenu(){
        $galaryMenus = GalaryMenu::where('publicationStatus',1)->get();
        return view('backEnd.galary.partial.createSubMenu',['galaryMenus' => $galaryMenus]);
    }

    // Save Menu Info
    public function storeSubMenu(Request $request){
        try{
            if($request->id == 0){
                $data =  new GalarySubMenu();
            }else{
                $data =  GalarySubMenu::findOrFail($request->id);
            }
            $data->galary_menu_id = $request->galary_menu_id;            
            $data->subMenuName = $request->subMenuName;
            $data->position = $request->position;
            $data->publicationStatus = $request->publicationStatus;
            $data->save();
            $output = ['status'=>'success','message'=>'Data Save Successfully','table'=> 1,'modal'=>1];
            return response()->json($output);
        }catch(Exception $e){
            $output = ['status'=>'error','message'=> $e->getMessage(),'table'=> 1,'modal'=>1];
            return response()->json($output);
        }        
    }

    // Edit Galary Menu Info
    public function editSubMenu($id){
        $data = GalarySubMenu::findOrFail($id);
        $galaryMenus = GalaryMenu::where('publicationStatus',1)->get();
        return view('backEnd.galary.partial.createSubMenu',['data' => $data,'galaryMenus'=> $galaryMenus]);
    }

    // Edit Galary Menu Info
    public function deleteSubMenu($id){
        $data = GalarySubMenu::findOrFail($id);
        $data->delete();
        $output = ['status'=>'success','message'=>'Data Delete Successfully','table'=> 1];
        return response()->json($output);
        
    }

}
