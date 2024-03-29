<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function product($name){

        $url = response()->file(storage_path('app/public/product/'. $name));
        return $url;
    }
    public function payment($name){
        $url = response()->file(storage_path('app/public/payment/image/'. $name));
        return $url;
    }
    public function profile($name){
        $url = response()->file(storage_path('app/public/profile/'. $name));
        return $url;
    }
    public function gcash($name){
        $url = response()->file(storage_path('app/public/gcash/'. $name));
        return $url;
    }
}
