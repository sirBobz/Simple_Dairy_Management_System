<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Produce;
use App\Models\FarmersDetail;
use Datatables;
use App\Models\Setting;
use DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    /* *
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    
    {
    
    $this->middleware('userAdmin', ['except' => 'login']);
    
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        
     $numb_famers = FarmersDetail::count();

     $total_milk_month = DB::table('produces')
         ->whereraw('MONTH(created_at) = ?', [date('n')] )
         ->sum ('milk_weight');

    $amount_today = DB::table('produces')
         ->whereraw('date(created_at) = ?', [carbon::today()] )
         ->sum ('milk_weight');

    $total_month = DB::table('produces')
         ->whereraw('MONTH(created_at) = ?', [date('n')] )
         ->sum ('milk_weight');

    $number_of_milk_record_today = DB::table('produces')
         ->whereraw('date(created_at) = ?', [carbon::today()] )
         ->count();   

    $Setting = Setting::orderBy('created_at', 'desc')->firstOrFail();
    $latestRate = $Setting->milk_rate;  

    $No_superAdmin = User::where('user_type', '=', 'superAdmin')->count();   
    $No_userAdmin = User::where('user_type', '=', 'userAdmin')->count();

    $highest_per_day = DB::table('produces')
         ->whereraw('date(created_at) = ?', [carbon::today()] )
         ->orderBy('milk_weight', 'desc')
         ->value('milk_weight');     
    
             
        return view('admin.dashboard',
            ['numb_famers'=>$numb_famers,
            'total_milk_month'=>$total_milk_month,
            'amount_today'=>$amount_today,
            'latestRate'=>$latestRate,
            'number_of_milk_record_today'=>$number_of_milk_record_today,
            'No_userAdmin'=>$No_userAdmin,
            'highest_per_day'=>$highest_per_day,
            'total_month'=>$total_month]);
    }

    /**
     * Show the farmers Details and add farmers details as well.
     *
     * @return \Illuminate\Http\Response
     */
    public function farmersDetails()
    {
        $usersDetails = FarmersDetail::orderBy('created_at', 'desc')->get();
        
        return view('admin.farmersDetails', 
            [
             'usersDetails'=>$usersDetails,
            ]);
    }

    /**
     * Show the farmers Produce and Add Milk Produce as well.
     *
     * @return \Illuminate\Http\Response
     */
    public function farmersProduce()
    
    {
        $ProduceDetails = Produce::orderBy('created_at', 'desc')->get();
      
       
       return view('admin.farmersProduce',
        ['ProduceDetails'=>$ProduceDetails]);
    }
    
    /**
     * Show the Reports select By Date on farmers Produce.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectReportsByDate()
    {

        return view('admin.selectReportsByDate');
    }

    /**
     * Show the admin users on the platform and add admin Interface.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminUsers()
    {
        $usersDetails = User::where('user_type', '=', 'userAdmin')->orderBy('created_at', 'desc')->get();
        return view('admin.adminUsers',
            [
               'usersDetails'=>$usersDetails,
            ]);
    }

    /**
     * Show the admin users on the platform and add admin Interface.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function setting()
    {

       return view('admin.setting'); 
    }

}
