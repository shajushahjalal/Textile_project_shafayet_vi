<?php

namespace App\Http\Controllers\BackEnd;

use App\Goal;
use App\GoalsContent;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GoalsController extends Controller
{
    protected $index;
    /**
     * Goal Part Setup
     */
    public function index(){
        $goals = Goal::first();
        return view('BackEnd.goal.index',['goals' => $goals]);
    }

    /**
     * Store Goal Info
     */
    public function store(Request $request){
        $data = Goal::find($request->id);
        if( empty($data->id)){
            $data = new Goal();
        }
        $data->heading = $request->heading;
        $data->text = $request->text;
        $data->save();
        $output = ['status' => 'success','message' => 'Save Successfully',];
        Return response()->json($output);
    }

    /**
     * Get All Goals Content
     */

    public function goalContent(Request $request){
        if($request->ajax()){
            $this->index= 0;
            $data = GoalsContent::all();
            return DataTables::of($data)
            ->addColumn('index',function(){
                $this->index++;
                return $this->index;
            })
            ->editColumn('image',function($row){
                return '<img src="'.asset($row->image).'" width="80" >';
            })
            ->addColumn('action',function($row){
                $li = '<a href="'.url('goals/content/edit/'.$row->id).'" class="ajax-click-page btn btn-info btn-sm">Edit</a> &nbsp; ';
                $li .= '<a href="'.url('goals/content/delete/'.$row->id).'" class="ajax-click btn btn-danger btn-sm" >Delete</a>';
                return $li;
            })
            ->RawColumns(['image','action'])
            ->make(true);
        }
    }


    /**
     *  Create Goal 
     * 
     */
    public function createContent(){
        return view('BackEnd.goal.partial.createGoalContent')->render();
    }

    /**
     * Save or Update 
     * Goal contents
     */
    public function storeContent(Request $request){
        try{
            if($request->id == 0){
                $data = new GoalsContent();
            }else{
                $data = GoalsContent::findOrFail($request->id);
            }
            $data->title = $request->title;
            $data->text = $request->text;
            $data->persent = $request->persent;
            $data->image    = $this->UploadImage($request, 'image', $this->contentImage, null, 300, $data->image);
            $data->save();
            $output = ['status' => 'success','message' => 'Save Successfully','table' => 1, 'modal'=>1 ];
            Return response()->json($output);
        }catch(Exception $ex){
            $output = ['status' => 'error','message' => 'Something went Wrong','table' => 1, 'modal'=>1 ];
            Return response()->json($output);
        }
    }

    /**
     * Edit Goals Content
     */
    public function editContent($id){
        $data = GoalsContent::findOrFail($id);
        return view('BackEnd.goal.partial.createGoalContent',['data'=>$data])->render();
    }

    /**
     * Delete Goals Content
     */
    public function deleteContent($id){
        $data = GoalsContent::findOrFail($id);
        $this->RemoveFile($data->image);
        $data->delete();
        $output = ['status' => 'success','message' => 'Delete Successfully','table' => 1, ];
        Return response()->json($output);
    }

}
