<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Conponents;

/**
 *
 * @author Sm Shahjalal Shaju
 */
use Image;

trait FileUpload {
    
    /*
     * Define Directories
     */
    protected  $productDir  = "storage/uploads/productImage/";
    protected  $logoDir     = "storage/uploads/logo/";
    protected  $sliderDir   = "storage/uploads/slider/";
    protected  $categoryDir = "storage/uploads/category/";
    protected  $featureDir  = "storage/uploads/feature/";
    protected  $userDir     = "storage/uploads/users/";
    protected  $contentImage = "storage/uploads/pages/";
    protected  $brandingImage = "storage/uploads/brands/";
    protected  $galaryImage = "storage/uploads/galary/";


    /*
     * ---------------------------------------------
     * Check the Derectory If exists or Not
     * ---------------------------------------------
     */
    protected function CheckDir($dir){
        if(!is_dir($dir)){
                mkdir($dir,0777,true);
        }
        
        if(!file_exists($dir.'index.php')){
            $file = fopen($dir.'index.php','w');
            fwrite($file," <?php \n /* \n Unauthorize Access \n @Developer: Sm Shahjalal Shaju \n Email: shajushahjalal@gmail.com \n */ ");
            fclose($file);
        }
    }
    
    /*
     * ---------------------------------------------
     * Check the file If exists then Delete the file
     * ---------------------------------------------
     */
    protected function RemoveFile($filePath) {
        if(file_exists($filePath)){
            unlink($filePath);
        }
    }
    
    /*
     * ---------------------------------------------
     * Upload an Image
     * Change Image height and width
     * Send the null value in height or width to keep 
     * the Image Orginal Ratio.
     * ---------------------------------------------
     */
    protected function UploadImage($request,$fileName,$dir,$width,$height,$oldFile){
        if(!$request->hasFile($fileName)){
            return $oldFile;
        }
        $this->CheckDir($dir);
        $this->RemoveFile($oldFile);
        
        $image = $request->file($fileName);
        $filename = $fileName.'_'.time().'.'.$image->getClientOriginalExtension();
        $path = $dir.$filename;
        if( empty($width) ){
            Image::make($image)->resize(null,$height,function($constant){
                $constant->aspectRatio();
            })->save($path);
        }
        elseif( empty($height) ){
            Image::make($image)->resize($width,null,function($constant){
                $constant->aspectRatio();
            })->save($path);
        }else{
            Image::make($image)->resize($width,$height)->save($path);
        }
        
        return $path;
    }



    
    /*
     * ---------------------------------------------
     * Upload any Kind of file
     * ---------------------------------------------
     */
    protected function UploadVideo($request,$fileName,$dir,$oldFile){
        if(!$request->hasFile($fileName)){
            return $oldFile;
        }
        $this->CheckDir($dir);
        $this->RemoveFile($oldFile); 
        $file = $request->file($fileName);  
        $Newfilename = 'video_'.time().'.mp4';
        $file->move($dir,$Newfilename); 
        return $dir.$Newfilename;
    }
    
    /**
     * ------------------------------------------------------------
     * Upload Multiple Image
     * ------------------------------------------------------------
     */
    protected function UploadMultipleImage($request,$fileName,$dir,$width,$height) {
        if($request->hasfile($fileName))
        {
            $this->CheckDir($dir);
            $count = 0;
            $allImage= [];
            foreach($request->file($fileName) as $image)
            {
                $filename = $fileName.$count.time().'.'.$image->getClientOriginalExtension();
                $path = $dir.$filename;
                Image::make($image)->resize($width,$height)->save($path);
                $allImage[$count] = $path;
                $count++;
            }
            return $allImage;
        }
    }
    
    
}
