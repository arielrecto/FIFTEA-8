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
}
