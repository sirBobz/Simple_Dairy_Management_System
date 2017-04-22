<?php

namespace App\Http\Controllers\farmers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth, DB, PDF;
use App\Models\MilkDetail;

class FarmerProcessingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('userMilkFarmer', ['except' => 'login']);
    }

    /**
     * Show PDF.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
        $userId = Auth::user()->id;

        $start = date("Y-m-d",strtotime($request->input('from_date')));
        $end = date("Y-m-d",strtotime($request->input('to_date')."+1 day"));
        
        $items = DB::table('milkDetails')
                 ->select(DB::raw('farmerName, farmer_ID, farmerDairyNum, sum(milk_weight) as total_milk,  sum(total_Amount) as amount'))
                 ->where('user_id', '=', $userId)
                 ->groupBy('farmerDairyNum', 'farmerName', 'farmer_ID')
                 ->get();
        view()->share('items',$items);

        if($request->has('download')){
            $pdf = PDF::loadView('Downloads.farmerPdf');
            return $pdf->download('dairy_Details.pdf');
        }

        return view('Downloads.farmerPdf');
    }

}
