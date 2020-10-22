<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class InventoryController extends Controller
{
    public function index() {
    	$products = Product::all();
        //$products = DB::table('products')->paginate(2);
        
        return view('admin.inventory', ['products'=>$products]);
    }

    public function update(Request $request, Product $id) {
        $validatedData = $request->validate([
            'text'.$id->id => 'required|numeric'
        ]);

    	//dd($request->{'text'.$id->id});

    	$id->stock = $request->{'text'.$id->id};

        $id->save();

    	return redirect('/inventory');
    }
}
