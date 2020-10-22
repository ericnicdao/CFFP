<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Tracker;
use DB;

class CustomerController extends Controller
{
    public function index() {

        $customers = DB::select('
            SELECT t1.code, fname, lname, status, address, barangay, city
              FROM trackers t1, status s, customers c
             WHERE s.id = status_id
               AND c.code = t1.code
               AND t1.updated_at = (
                   SELECT MAX(updated_at)
                   FROM trackers t2
                   WHERE t1.code = t2.code
               )
        ');

        //dd($customers);
        return view ('admin.customers',['customers'=>$customers]);

    }

    public function test() {
        dd(Customer::all());
    }
    


    
}
