<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function preview() {
        return view('sales.preview');
    }
}
