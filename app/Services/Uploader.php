<?php namespace App\Services;

use Illuminate\Support\Facades\Auth;

class Uploader {

    public function upload($file)
    {
        $destinationPath = public_path().'/uploads/';

        if (Auth::check()) {
            $filename = str_replace(' ', '_', str_random(20) . Auth::id() . $file->getClientOriginalName());
        }
        else {
            $filename = str_replace(' ', '_', str_random(20) . $file->getClientOriginalName());
        }

        $uploadSuccess = $file->move($destinationPath, $filename);
        
        return $filename;
    }

}
