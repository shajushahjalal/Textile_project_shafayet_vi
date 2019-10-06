<?php

namespace App\Http\Controllers\BackEnd;

use App\Client;
use App\ClientList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ClientController extends Controller
{
    protected $index;
    /**
     * Client Part Setup
     */
    public function index(){
        $client = Client::first();
        return view('backEnd.client.index',['client' => $client]);
    }

    /**
     * Store Client Info
     */
    public function store(Request $request){
        $data = Client::find($request->id);
        if( empty($data->id)){
            $data = new Client();
        }
        $data->pageTitle = $request->pageTitle;
        $data->text = $request->text;
        $data->save();
        $output = ['status' => 'success','message' => 'Save Successfully',];
        Return response()->json($output);
    }

    /**
     * Get All Client Content
     */

    public function clientList(Request $request){
        if($request->ajax()){
            $this->index= 0;
            $data = ClientList::all();
            return DataTables::of($data)
            ->addColumn('index',function(){
                $this->index++;
                return $this->index;
            })
            ->editColumn('image',function($row){
                return '<img src="'.asset($row->image).'" width="80" >';
            })
            ->editColumn('link',function($row){
                return '<a href="'.$row->link.'" target="_blank">link</a>';
            })
            ->addColumn('action',function($row){
                $li = '<a href="'.url('client/list/edit/'.$row->id).'" class="ajax-click-page btn btn-info btn-sm">Edit</a> &nbsp; ';
                $li .= '<a href="'.url('client/list/delete/'.$row->id).'" class="ajax-click btn btn-danger btn-sm" >Delete</a>';
                return $li;
            })
            ->RawColumns(['image','action','link'])
            ->make(true);
        }
    }


    /**
     *  Create Client List 
     * 
     */
    public function createContent(){
        return view('backEnd.client.partial.createClientlist')->render();
    }

    /**
     * Save or Update 
     * Client List
     */
    public function storeClientList(Request $request){
        try{
            if($request->id == 0){
                $data = new ClientList();
            }else{
                $data = ClientList::findOrFail($request->id);
            }
            $data->name = $request->name;
            $data->link = $request->link;
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
     * Edit Client List Content
     */
    public function editClientList($id){
        $data = ClientList::findOrFail($id);
        return view('backEnd.client.partial.createClientlist',['data'=>$data])->render();
    }

    /**
     * Delete Client List Content
     */
    public function deleteClientList($id){
        $data = ClientList::findOrFail($id);
        $this->RemoveFile($data->image);
        $data->delete();
        $output = ['status' => 'success','message' => 'Delete Successfully','table' => 1, ];
        Return response()->json($output);
    }
}
