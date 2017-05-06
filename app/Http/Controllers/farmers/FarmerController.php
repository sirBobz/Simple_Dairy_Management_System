<?php

namespace App\Http\Controllers\farmers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produce;
use App\Models\FarmersDetail;
use Auth;
use App\Models\Setting;
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
    $numb_famers = FarmersDetail::count();

    $total_milk_month = DB::table('produces')
          ->where('user_id', $userId)
         ->whereraw('MONTH(created_at) = ?', [date('n')] )
         ->sum ('milk_weight');

    $Setting = Setting::orderBy('created_at', 'desc')->firstOrFail();
    $latestRate = $Setting->milk_rate;

    $month_amount =  $total_milk_month * $latestRate;    

    $amount_today = DB::table('produces')
          ->where('user_id', $userId)
         ->whereraw('date(created_at) = ?', [carbon::today()] )
         ->sum ('milk_weight');

    $total_month = DB::table('produces')
         ->where('user_id', $userId)
         ->whereraw('MONTH(created_at) = ?', [date('n')] )
         ->sum ('milk_weight');

    $total_milk_delivered = Produce::where('user_id','=', $userId)->sum('milk_weight');    

        

        return view('farmer.dashboard',
            ['total_milk_delivered'=>$total_milk_delivered,
            'total_milk_month'=>$total_milk_month,
            'amount_today'=>$amount_today,
            'month_amount'=>$month_amount,
            'total_month'=>$total_month]);
    }

    /**
     * Show the farmers Details.
     *
     * @return \Illuminate\Http\Response
     */
    public function farmersDetails()
    {
        $userEmail = Auth::user()->email;

        $usersDetails = User::where('email', '=', $userEmail)->orderBy('created_at', 'desc')->get();
        
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
       
       $farmersProduce = Produce::where('user_id', '=', $userId)->orderBy('created_at', 'desc')->get();
       
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
