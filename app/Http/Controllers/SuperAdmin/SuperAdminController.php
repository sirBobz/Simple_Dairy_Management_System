<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Produce;
use App\Models\FarmersDetail;
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
        

        //$total_milk = MilkDetail::select(DB::raw("SUM(milk_weight) as milk_weight, MONTH(created_at) as month"))
            // ->orderBy("created_at")
            // ->groupBy(DB::raw("MONTH(created_at)"))
            // ->get()->toArray();
    
             
        return view('SuperAdmin.dashboard');
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
    
    public function setting()
    {

       return view('SuperAdmin.setting'); 
    }

}
