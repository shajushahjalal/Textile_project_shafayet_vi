<?php

namespace App\Http\Controllers\Install;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Composer\Semver\Comparator;
use App\SystemInfo;
use DB;
use Exception;

class InstallController extends Controller
{

    //Show Instrallation page
    public function ShowInstallPage() {
        if(file_exists('config/setup.php')){
            abort(404);
        }
        Artisan::call('migrate:reset');
        return view('install.install');
    }
    
    // Application Install
    public function Install(Request $request) {
        if(file_exists('config/setup.php')){
            abort(404);
        }
        $this->validate($request, [
            'applicationName' =>'required','titleName'=>'required',
            'phoneNo' => 'required|min:6','country' =>'required',
            'dateFormat' => 'required','logo' => 'image|mimes:jpeg,png,jpg,',
            'favicon' => 'image|mimes:jpeg,png,jpg,','email'=>'required|email|max:100'
        ]);
        try{
            DB::beginTransaction();
            $this->RunInstall();            
            $this->GenerateAutomaticData();  
            $this->UpdateConfigaration();                     
            $this->AddSystemInfo($request);             
            DB::commit();
            return redirect('/login')->with('success','Application Installed Successfully. Login Email:admin@admin.com Password:Admin@01');
        } catch (Exception $ex) {
            DB::rollback();
            if(file_exists('config/setup.php')){
                unlink('config/setup.php');
            }
            return redirect('/install')->with('error','Something went wrong. Failed to Install.');
        }        
    }
    
    /*
     * Add Default System Info
     */
    public function AddSystemInfo($request) {
        $data = new SystemInfo();
        $data->applicationName = $request->applicationName;
        $data->titleName = $request->titleName;
        $data->phoneNo = $request->phoneNo;
        $data->city = $request->city;
        $data->email = $request->email;
        $data->zipCode = $request->zipCode;
        $data->address = $request->address;
        $data->country = $request->country;
        $data->state = $request->state;
        $data->shippingCost = $this->makeNumber($request->shippingCost);
        $data->currency = $request->currency;
        $data->dateFormat = $request->dateFormat;
        $data->version = '1.0.0';
        $data->logo = $this->UploadImage($request, 'logo', $this->logoDir, 350,60, $data->logo);
        $data->favicon = $this->UploadImage($request, 'favicon', $this->logoDir, 35,35, $data->favicon);
        $data->save();
    }
    
    
    /*
     * Update the Application
    */

    public function ShowUpdatePage(){
        $system = SystemInfo::first();
        $systemVersion = !empty($system->version)?$system->version:'00';
        $appVersion = config('setup.version');
        //dd($appVersion);
        if(Comparator::greaterThan($appVersion,$systemVersion)){
            return view('install.installUpdate');
        }else{
            abort(404);
        }
        
    }

    public function UpdateInstall() {
        $system = SystemInfo::first();
        $systemVersion = !empty($system->systemVersion)?$system->systemVersion:'00';
        $appVersion = config('author.app_version');
        if(Comparator::greaterThan($systemVersion, $appVersion)){
           try{
                DB::beginTransaction();
                $this->RunInstall();            
                $this->UpdateSystemInfo($system);
                DB::commit();
                return redirect('/home')->with('success','Version: '.$appVersion.' Update Successfully');
            } catch (\Exception $e) {
                DB::rollback();                
                return redirect('home')->with('error','System Error. Failed to update.');
            }
        }
        else{
            abort(404);
        }
        
    }
    
    /*
     * Update System Information
     */    
    protected function UpdateSystemInfo($system) {        
        $system->version = config('setup.version');
        $system->save();
    }
    
    /*
     * Run Install Command
     */
    protected function RunInstall() {
        $this->InstallationPrepration();
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '512M');
        DB::statement('SET default_storage_engine=INNODB;');
        Artisan::call('migrate', ["--force"=> true]);        
    }
    
    /*
     * Generate Automatic value into Database
     */
    protected function GenerateAutomaticData() {
        Artisan::call('db:seed');
    }
    
    /*
     * Prepare Installation Settings
     */    
    protected function InstallationPrepration() {
        config(['app.debug' => true]);
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
    }
    
    /*
     * Rewrite Configuration File
     */    
    protected function UpdateConfigaration()
    {        
        $file = fopen(base_path().'/'.'config/setup.php','w');
        $text = " <?php \n\n/* \n* Application Setup Done \n* @Developer: Sm Shahjalal Shaju \n * Email: shajushahjalal@gmail.com \n*/\n";
        $text .= "return[ \n \t'version' => '1.0.0',\n];";        
        fwrite($file,$text);
        fclose($file);


    }
    
    
}
