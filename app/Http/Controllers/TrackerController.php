<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tracker;
use DB;

class TrackerController extends Controller
{
    public function loadTracker(Request $request) {
        $tracker = DB::table('trackers')
        ->select('code', 'status', 'trackers.updated_at', 'description')
        ->join('status', 'status.id', 'status_id')
        ->where('trackers.code', $request->txtCode)
        ->get();

        $code = Tracker::all()->where('code',$request->txtCode)->first();
        //dd($code);
        return view('visitor.trackerBody', ['tracker'=>$tracker])->with('code',$code->code);
    }
}
/*

        SELECT t1.code, status
  FROM trackers t1, status
 WHERE id = status_id
   AND t1.updated_at = (
       SELECT MAX(updated_at)
         FROM trackers t2
        WHERE t1.code = t2.code
       )
        */

        //B2U8Vjn1st