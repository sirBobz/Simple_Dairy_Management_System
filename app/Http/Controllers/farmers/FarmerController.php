<?php

namespace App\Http\Controllers\farmers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MilkDetail;
use Auth;
use DB;
use Carbon\Carbon;

class FarmerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('userMilkFarmer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $userId = Auth::user()->id;

        $farmersDetails = User::where('id', '=', $userId)->first();
        $total_Amount_now = $farmersDetails->total_milk;

        $total_milk_per_month = DB::table('milkDetails')
               ->where('user_id', '=', $userId)
              ->whereraw('MONTH(created_at) = ?', [date('n')])
              ->sum('milk_weight');

        $amount_collected_today = DB::table('milkDetails')
            ->where('user_id', '=', $userId)
            ->whereRaw('date(created_at) = ?', [Carbon::today()])
            ->sum('milk_weight');

        $total_amount_this_month = DB::table('milkDetails')
              ->where('user_id', '=', $userId)
              ->whereraw('MONTH(created_at) = ?', [date('n')])
              ->sum('total_Amount');    


        return view('farmer.dashboard',
            [
             'total_Amount_now'=>$total_Amount_now,
             'total_milk_per_month'=>$total_milk_per_month,
             'amount_collected_today'=>$amount_collected_today,
             'total_amount_this_month'=>$total_amount_this_month,
            ]);
    }

    /**
     * Show the farmers Details.
     *
     * @return \Illuminate\Http\Response
     */
    public function farmersDetails()
    {
        $userEmail = Auth::user()->email;

        $usersDetails = User::where('email', '=', $userEmail)->orderBy('created_at', 'desc')->paginate(10);
        
        return view('farmer.farmersDetails', ['usersDetails'=>$usersDetails]);
    }

    /**
     * Show the farmers Produce.
     *
     * @return \Illuminate\Http\Response
     */
    public function farmersProduce()
    {
       $userId = Auth::user()->id;
       
       $farmersProduce = MilkDetail::where('user_id', '=', $userId)->orderBy('created_at', 'desc')->paginate(10);
       
       return view('farmer.farmersProduce', ['farmersProduce'=>$farmersProduce]);
    }
    
    /**
     * Show the Reports select By Date on farmers Produce.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectReportsByDate()
    {

        return view('farmer.selectReportsByDate');
    }

    /**
     * Show the admin users on the platform.
     *
     * @return \Illuminate\Http\Response
     */
    public function farmusers()
    {
        
        return view('farmer.Users');
    }
}
