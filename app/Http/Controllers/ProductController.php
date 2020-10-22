<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Auth;

class ProductController extends Controller
{
    public function index() {
        //This loads the products from the database to the view
        $products = Product::all();
        //$products = DB::table('products')->paginate(2);
        
        if (Auth::check())
            return view('admin.products', ['products'=>$products]);
        else
            return view ('visitor.shop', ['products'=>$products]);

        /*if (Auth::check())
            return view('/admin/admin', ['products'=>$products]);
        else
            return view('/visitor/shop', ['products'=>$products]);*/
    }

    public function loadCreate() {
        //This adds products from view to database
        return view('/admin/create');
    }

    public function loadProd(Product $id) {
        return view('/admin/product', ['product'=>$id]);
    }
    
    public function editProd(Product $id, Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'desc' => 'max:255',
            'price' => 'required|numeric'
        ]);

        $id->name = $request->name;
        $id->desc = $request->desc;
        $id->price = $request->price;

        $id->save();

        return redirect('/list');
    }

    public function add(Request $request) {
        $validatedData = $request->validate([
            'image' => 'required',
            'name' => 'required|max:255',
            'desc' => 'max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->unit = $request->unit;
        $product->stock = 0;
        $product->imgPath = substr($request->image->store('public'),6);

        $product->save();
        //dd();
        $request->image->store('public');

        return redirect('/list');
    }

    public function delete(Request $request) {
        $chkBoxesChecked = $request->delChk;

        foreach($chkBoxesChecked as $chkBox) {
            Product::where('id',$chkBox)->delete();
        }

        return redirect('/list');
    }
}
