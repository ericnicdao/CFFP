<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tracker;
use DB;

class OrderController extends Controller
{
    public function index($code,$name,$address,$status) {
        $orders = DB::table('customers')
        ->join('orders','customers.id','customer_id')
        ->join('products','products.id','product_id')
        ->where('code',$code)
        ->get();

        //dd($orders);
        return view('admin.order', ['orders'=>$orders])
            ->with('name',$name)
            ->with('code',$code)
            ->with('address',$address)
            ->with('status',$status);
    }

    public function process($code,$name,$address,$status) {
        $tracker = new Tracker();
        $tracker->code = $code;

        if($status == 'Pending') {
            $tracker->status_id = 2;
        }
        if($status == 'For Delivery') {            
            $tracker->status_id = 3;
        }
        if($status == 'Delivering') {
            $tracker->status_id = 4;
        }

        $tracker->save();

        return redirect('/orders');
    }
}

//Pending
//For Delivery
//Delivering
//Delivered
//Cancelled