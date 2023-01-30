<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $checkouts = checkout::with('Camp')->whereUserId(Auth::id())->get();
        return view('user.dashboard',[
            'checkouts' => $checkouts,
        ]);
    }
}
