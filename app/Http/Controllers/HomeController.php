<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {

        $user = Auth::user();
        switch ($user->getRoleNames()->first()) {
            case 'admin':
                return redirect()->route('admin.dashboard.index');
                break;
            case 'customer':
                return redirect(route('products'));
                break;
            case 'employee':
                return redirect(route('employee.dashboard.index'));
            default:
                return abort(403);
        }
    }
}
