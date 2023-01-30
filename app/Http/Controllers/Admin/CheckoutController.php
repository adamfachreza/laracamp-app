<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function update(Request $request,checkout $checkout)
    {
        $checkout->is_paid = true;
        $checkout->save();
        $request->session()->flash('success',"Checkout with ID {$checkout->id} has been updated");
        return redirect(route('admin.dashboard'));
    }
}