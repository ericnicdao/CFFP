<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Tracker;
use Cart;

class CartController extends Controller
{
    public function index() {
        $items = Cart::content();

        //echo dd($items);
        return view('visitor.cart', ['items'=>$items]);        
    }

    public function store(Request $request) {
        Cart::add($request->id, $request->name, 1/*$request->qty*/, $request->price, ['unit'=>$request->unit, 'stock'=>$request->stock]);

        return redirect('/shop');
    }

    public function clear() {
        Cart::destroy();

        return redirect('/cart');
    }

    public function checkout(Request $request) {
        $random = Str::random(10); //Creates a random number for Tracker entity

        $customer = new Customer();
        $customer->fname = $request->fname;
        $customer->lname = $request->lname;
        $customer->contact = $request->contact;
        $customer->address = $request->address;
        $customer->barangay= $request->barangay;
        $customer->zip = $request->zip;
        $customer->city = $request->city;
        $customer->code = $random;

        $tracker = new Tracker();
        $tracker->code = $random;
        $tracker->status_id = '1';

        $customer->save();
        $tracker->save();

        foreach(Cart::content() as $item) {
            /*
                Checks which products are in the cart and subtracts the total orders to the 
                current stock of the product.
                This needs to be transferred once orders has been received by customer.
            */
            //$product = Product::find($item->id);
            //$product->stock = number_format($item->options->stock,2) - $item->qty;

            //$product->save();
            
            $customer = Customer::latest()->first();

            $order = new Order();
            $order->customer_id = $customer->id;
            $order->product_id = $item->id;
            $order->qty = $item->qty;
            $order->price = $item->price * $item->qty;

            $order->save();
        }

        Cart::destroy();

        return view('visitor.thankyou')->with('id',$random);
    }
    
    public function update($rowId, $qty) {
        //echo $rowId . ' ' . $qty . '<br />';   
        Cart::update($rowId, $qty);

        return redirect('/cart');
    }

    public function remove($rowId) {;
        Cart::remove($rowId);

        return redirect('/cart');
    }
}
