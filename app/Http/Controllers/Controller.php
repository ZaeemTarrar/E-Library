<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Auth;
use Session;
use Storage;
use App\Notification;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //Add By Faraz
    protected function uploadfile($request,$filename='snap'){
        $snap ='';
        if($request->hasFile($filename)){
            $path = $request->file($filename);
            if($filename!='snap'){
               $ext = $request->file($filename)->getClientOriginalExtension();
                if($ext=='pdf'||$ext=='doc'||$ext=='txt')
                {
                    $target = 'public\document';
                }else if($ext=='mp3'||$ext=='mp4'){
                    $target = 'public\audio';
                }
            }else{
                $target = 'public\images';
            }
            $snap  = Storage::putFile($target,$path);
            $snap = substr($snap,7,strlen($snap)-7);
        }
        return $snap;
    }

    protected function updatefile($request,$img,$filename="snap"){
        $snap =$img;
        if($request->hasFile($filename)){
            if($img!=''){
                if($this->remove($img)){
                    $path = $request->file($filename);

                    if($filename!='snap'){
                        $ext = $request->file($filename)->getClientOriginalExtension();
                         if($ext=='pdf'||$ext=='doc'||$ext=='txt')
                         {
                             $target = 'public\document';
                         }else if($ext=='mp3'||$ext=='mp4'){
                             $target = 'public\audio';
                         }
                     }else{
                         $target = 'public\images';
                     }
                    $snap  = Storage::putFile($target,$path);
                    $snap = substr($snap,7,strlen($snap)-7);
                }
            }else{
                $path = $request->file($filename);
                if($filename!='snap'){
                    $ext = $request->file($filename)->getClientOriginalExtension();
                     if($ext=='pdf'||$ext=='doc'||$ext=='txt')
                     {
                         $target = 'public\document';
                     }else if($ext=='mp3'||$ext=='mp4'){
                         $target = 'public\audio';
                     }
                 }else{
                     $target = 'public\images';
                 }
                $snap  = Storage::putFile($target,$path);
                $snap = substr($snap,7,strlen($snap)-7);
            }
        }
        return $snap;
    }
    //End
    public function sessionize($request, $list)
    {
        foreach ($list as $key => $item) {
            Session::flash($item, $request->$item);
        }
    }

    protected function upload($request, $filename, $inputname)
    {
        //Check if the directory with the name already exists
        if (!is_dir($filename)) {
            //Create our directory if it does not exist
            mkdir($filename);
        }
        $snap;
        // this will check if the file was uploaded
        if ($request->hasFile($inputname)) {
            // this will add the file in the file bucket of the memory of laravel
            $path = $request->file($inputname);
            $target = 'public/' . $filename;
            // stores the image in the public/banners
            $snap = Storage::putFile($target, $path);
            $snap = substr(
                $snap,
                7,
                strlen($snap) - 7
            );
        } else {
            $snap = "";
        }
        return $snap;
    }

    protected function remove($file)
    {
        if ($file) {
            Storage::delete('public/' . $file);
            return true;
        } else {
            return false;
        }
    }

    public function success_notice($msg)
    {
        Session::flash('message', $msg);
        $n = new Notification;
        $n->user_id = Auth::user()->id;
        $n->message = $msg;
        $n->status = 0;
        $n->notificationtype_id = 2;
        $n->save();
        return;
    }

    public function error_notice($msg)
    {
        Session::flash('error', $msg);
        $n = new Notification;
        $n->user_id = Auth::user()->id;
        $n->message = $msg;
        $n->status = 0;
        $n->notificationtype_id = 3;
        $n->save();
        return;
    }

    public function upgrade_notice($msg)
    {
        Session::flash('upgrade', $msg);
        $n = new Notification;
        $n->user_id = Auth::user()->id;
        $n->message = $msg;
        $n->status = 0;
        $n->notificationtype_id = 4;
        $n->save();
        return;
    }

    public function info_notice($msg)
    {
        Session::flash('info', $msg);
        $n = new Notification;
        $n->user_id = Auth::user()->id;
        $n->message = $msg;
        $n->status = 0;
        $n->notificationtype_id = 5;
        $n->save();
        return;
    }
}
