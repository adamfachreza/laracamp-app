<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\checkout;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function welcome()
    {
        return view('welcome');
    }

    public function dashboard()
    {
      switch(Auth::user()->is_admin){
        case true:
            return redirect(route('admin.dashboard'));
            break;

            default:
            return redirect(route('user.dashboard'));
      }
    }
}
