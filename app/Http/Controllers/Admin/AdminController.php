<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::with('Camp')->get();
        return view('admin.dashboard', [
            'checkouts' => $checkouts
        ]);


        // $checkouts = checkout::with('Camp')->whereUserId(Auth::id())->get();
        // return view('admin.dashboard',[
        //     'checkouts' => $checkouts,
        // ]);
    }
}
