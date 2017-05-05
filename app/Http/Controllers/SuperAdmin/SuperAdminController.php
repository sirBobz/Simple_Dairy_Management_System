<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Produce;
use App\Models\FarmersDetail;
use App\Models\Setting;
use Datatables;
use DB, Auth;
use Carbon\Carbon;


class SuperAdminController extends Controller
{
    /* *
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    
    {
    
    $this->middleware('superAdmin', ['except' => 'login']);
    
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

    $Setting = Setting::orderBy('created_at', 'desc')->firstOrFail();
    $latestRate = $Setting->milk_rate;  

    $No_superAdmin = User::where('user_type', '=', 'superAdmin')->count();   
    $No_userAdmin = User::where('user_type', '=', 'userAdmin')->count();

    $highest_per_day = DB::table('produces')
         ->whereraw('date(created_at) = ?', [carbon::today()] )
         ->orderBy('milk_weight', 'desc')
         ->value('milk_weight');
             
        return view('SuperAdmin.dashboard',
            ['numb_famers'=>$numb_famers,
            'total_milk_month'=>$total_milk_month,
            'amount_today'=>$amount_today,
            'latestRate'=>$latestRate,
            'No_superAdmin'=>$No_superAdmin,
            'No_userAdmin'=>$No_userAdmin,
            'highest_per_day'=>$highest_per_day,
            'total_month'=>$total_month]);
    }

    /**
     * Show user admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function userAdmin()
    {
        $usersDetails = User::where('user_type', '=', 'userAdmin')->get();
        
        return view('SuperAdmin.userAdmin', 
            [
             'usersDetails'=>$usersDetails,
            ]);
    }

    /**
     * Show the farmers Produce and Add Milk Produce as well.
     *
     * @return \Illuminate\Http\Response
     */
    public function produce()
    
    {
      $ProduceDetails = Produce::all();
       
       return view('SuperAdmin.farmersProduce',
        [
          'ProduceDetails'=>$ProduceDetails,
        ]);
    }
    
    /**
     * Show the Reports select By Date on farmers Produce.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectReportsByDate()
    {

        return view('SuperAdmin.selectReportsByDate');
    }

    /**
     * Show the admin users on the platform and add admin Interface.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $usersDetails = User::where('user_type', '=', 'superAdmin')->get();
        return view('SuperAdmin.users',
            [
               'usersDetails'=>$usersDetails,
            ]);
    }

    /**
     * Show the admin users on the platform and add admin Interface.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function settings()
    {
         $SettingDetails = Setting::all();
    
       return view('SuperAdmin.settings', compact('SettingDetails')); 
    }


    public function farmers()
    {

        $usersDetails = FarmersDetail::all();
        
        return view('SuperAdmin.farmersDetails', 
            [
             'usersDetails'=>$usersDetails,
            ]);
    }
}
