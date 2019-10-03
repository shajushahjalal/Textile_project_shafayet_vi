<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Country;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    use AuthenticatesUsers;

    // Customer Account Open page
    public function createAccount(){
        if( Auth::check() ){
            return redirect('/my-account');
        }
        $countries = Country::get();
        return view('frontEnd.user.openAccount',['countries' => $countries]);
    }

    //Save User Info
    public function store(Request $request){
        $user = new User();
        $request->validate([
            'firstName' =>  ['required','max:250'],
            'lastName'  =>  ['required','max:250'],
            'email'     =>  ['required','unique:users','max:90'],
            'city'      =>  ['required','max:100'],
            'zip'       =>  ['required','max:30'],
            'country'   =>  ['required','max:250'],
            'phoneNo'   =>  ['required','max:20'],
            'password'  =>  ['required', 'string', 'min:8', 'confirmed'],
        ]);        
        try{
            DB::beginTransaction();

            event(new Registered( $user = $this->saveUserInfo($user,$request,0) ));
            $this->guard()->login($user);

            DB::commit();
            return redirect('/my-account')->with('success','Account create Successfully');

        }catch(\Exception $ex){
            DB::rollback();
            return redirect('/login')->with('error','Something went wrong, Try again later');
        }
        
        
    }

    //Set User Info
    public function saveUserInfo($user,$request,$role = null){
        $user->firstName = !empty($request->firstName)?$request->firstName:$user->firstName;
        $user->lastName = !empty($request->lastName)?$request->lastName:$user->lastName;
        $user->email = !empty($request->email)?$request->email:$user->email;
        $user->city = !empty($request->city)?$request->city:$user->city;
        $user->zip = !empty($request->zip)?$request->zip:$user->zip;
        $user->country = !empty($request->country)?$request->country:$user->country;
        $user->state = !empty($request->state)?$request->state:$user->state;
        $user->phoneNo = !empty($request->phoneNo)?$request->phoneNo:$user->phoneNo;
        $user->address = !empty($request->address)?$request->address:$user->address;
        $user->is_admin = $role == Null ? $user->is_admin : $role;
        $user->address = !empty($request->address)?$request->address:$user->address;
        $user->password = !empty($request->password)?bcrypt($request->password):$user->password;
        $user->name = $user->firstName.' '.$user->lastName;
        $user->image = $this->UploadImage($request,'image',$this->userImageDir,'150','150',$user->image);
        $user->save();
        return $user;
    }

    //Show User Account
    public function customerAccount(){
        return view('frontEnd.user.userAccount');
    }

    // user Profile
    public function userProfile(){
        $countries = Country::get();
        return view('frontEnd.user.partial.profile',['countries'=>$countries])->render();
    }

    public function updateProfile(Request $request){
        try{
            DB::beginTransaction();
            $user = User::find(Auth::user()->id);
            $this->saveUserInfo($user,$request);
            DB::commit();
            return response()->json('success');
        }catch(\Exception $ex){
            DB::rollback();
            return response()->json('something went wrong');
        }
    }

    public function updatePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'password'  =>  ['required', 'string', 'min:8', 'confirmed'],
        ]);  
        if(!$validator){
            return response()->json("Password dosen't match");
        }    
        try{
            DB::beginTransaction();
            $user = User::find(Auth::user()->id);
            $this->saveUserInfo($user,$request);
            DB::commit();
            return response()->json('success');
        }catch(\Exception $ex){
            DB::rollback();
            return response()->json('something went wrong');
        }
    }
}
