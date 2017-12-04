<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //below function .....
    public function ordersManagement()
    {
        $data=Order::all();
        return view('admin.ordersManagement',compact('data'));
    }
}
