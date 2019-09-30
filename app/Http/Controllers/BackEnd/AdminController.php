<?php

namespace App\Http\Controllers\BackEnd;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontEnd\CustomerController;
use Illuminate\Support\Facades\DB;
use App\SystemInfo;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    
    /*
     * Website Settingd
     */
    public function ShowSettings() {
        return view('backEnd.admin.settings');
    }
    
    // Update Website Settings
    public function UpdateSettings(Request $request) {
        try{
            DB::beginTransaction();
            $data = SystemInfo::first();
            $data->applicationName = $request->applicationName;
            $data->titleName = $request->titleName;
            $data->phoneNo = $request->phoneNo;
            $data->email = $request->email;
            $data->city = $request->city;
            $data->zipCode = $request->zipCode;
            $data->address = $request->address;
            $data->country = $request->country;
            $data->shippingCost = $this->makeNumber($request->shippingCost);
            $data->currency = $request->currency;
            $data->dateFormat = $request->dateFormat;
            $data->version = '1.0.0';
            $data->logo = $this->UploadImage($request, 'logo', $this->logoDir, null, 60, $data->logo);
            $data->favicon = $this->UploadImage($request, 'favicon', $this->logoDir, 35,35, $data->favicon);
            $data->save();
            DB::commit();
            return back()->with('success','Information Update successfully');
        } catch (Exception $ex) {
            DB::rollback();
            return back()->with('error','Something went wrong');
        }
    }

    // Get Profile
    public function getProfile($id = null){
        $self_edit = empty($id) ? 1 : 0;
        $user_id = empty($id) ? Auth::user()->id : $id;
        $data = User::findOrFail($user_id);
        $countries = Country::all();
        return view('backEnd.admin.profile',['data' => $data,'countries'=>$countries,'self_edit' => $self_edit ]);
    }

    // Update Profile
    public function updateProfile(Request $request){
        try{
            $CustomerController = new CustomerController();
            $user = User::findOrFail($request->user_id);
            $is_admin = isset($request->is_admin) ? $request->is_admin : '0';
            $CustomerController->saveUserInfo($user,$request, $is_admin);
            return back()->with('success','Profile Info Upfate Successfull');
        }catch(Exception $e){
            return back()->with('error','Something Went Wrong');
        }
    }

    public function updatePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'password'  =>  ['required', 'string', 'min:8', 'confirmed'],
        ]);  
        if(!$validator){
            return back()->with('error',"Password dosen't match");
        }    
        try{
            DB::beginTransaction();
            $user = User::findOrFail($request->user_id);
            $CustomerController = new CustomerController();
            $CustomerController->saveUserInfo($user,$request);
            DB::commit();
            return back()->with('success','Password Change Successfully');
        }catch(\Exception $ex){
            DB::rollback();
            return back()->with('error','Something Went Wrong');
        }
    }

    Public function createUser(){
        $countries = Country::all();
        return view('backEnd.admin.createUser',['countries'=>$countries]);
    }

    // Save User Info into Database
    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'firstName' =>  ['required','max:250'],
            'email'     =>  ['required','unique:users','max:90'],
            'city'      =>  ['required','max:100'],
            'country'   =>  ['required','max:250'],
            'password'  =>  ['required', 'string', 'min:8', 'confirmed'],
        ]); 
        if($validator->fails()){
            $output = ['status' =>'error','message'=>$validator->errors()->first() ];
            return response()->json($output);
        }

        try{
            $CustomerController = new CustomerController();
            $user = new User();
            $CustomerController->saveUserInfo($user, $request, $request->is_admin);
            $output = ['status' =>'success','message'=> 'User Create Successfully'];
            return response()->json($output);
        }catch(Exception $ex){
            $output = ['status' =>'error','message'=> 'Woops! Something Went Wrong'];
            return response()->json($output);
        }
        
    }

    public function manageUser(Request $request){
        if($request->ajax()){
            $users = User::all();
            $this->index = 0;
            return DataTables::of($users)
            ->addColumn('index',function($data){
                $this->index++;
                return $this->index;
            })
            ->addColumn('role',function($data){
                return $data->is_admin == 1 ? '<span class="badge badge-danger">Admin</span>':'<span class="badge badge-success">User</span>';
            })
            ->addColumn('action',function($data){
                return '<a href="'.url('user/profile/'.$data->id).'" > <span class="fas fa-edit"></span> Edit </a>';
            })
            ->rawColumns(['role','action'])
            ->make(true);
        }
        return view('backEnd.admin.userList');
    }
}
