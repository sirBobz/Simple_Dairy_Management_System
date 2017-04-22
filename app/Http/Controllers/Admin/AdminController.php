<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MilkDetail;
use Datatables;
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
        $number_farmers = User::where('user_type', '=', 'userMilkFarmer')->count();
        
        $total_milk_per_month = DB::table('milkDetails')
              ->whereraw('MONTH(created_at) = ?', [date('n')])
              ->sum('milk_weight');

        $amount_collected_today = DB::table('milkDetails')
            ->whereRaw('date(created_at) = ?', [Carbon::today()])
            ->sum('milk_weight');

        $total_amount_this_month = DB::table('milkDetails')
              ->whereraw('MONTH(created_at) = ?', [date('n')])
              ->sum('total_Amount');

        
        return view('admin.dashboard',
            [
             'number_farmers'=>$number_farmers,
             'total_milk_per_month'=>$total_milk_per_month,
             'amount_collected_today'=>$amount_collected_today,
             'total_amount_this_month'=>$total_amount_this_month,
            ]);
    }

    /**
     * Show the farmers Details and add farmers details as well.
     *
     * @return \Illuminate\Http\Response
     */
    public function farmersDetails()
    {
        $usersDetails = User::where('user_type', '=', 'userMilkFarmer')->get();
        
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
      $data = MilkDetail::all ();
       
       return view('admin.farmersProduce',
        [
          'data'=>$data,
        ]);
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
        $usersDetails = User::where('user_type', '=', 'userAdmin')->orderBy('created_at', 'desc')->paginate(10);
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
