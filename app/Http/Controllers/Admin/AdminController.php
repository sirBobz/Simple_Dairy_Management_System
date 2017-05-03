<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Produce;
use App\Models\FarmersDetail;
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
        


     
    
             
        return view('admin.dashboard');
    }

    /**
     * Show the farmers Details and add farmers details as well.
     *
     * @return \Illuminate\Http\Response
     */
    public function farmersDetails()
    {
        $usersDetails = FarmersDetail::all();
        
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
        $ProduceDetails = Produce::all();
      
       
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
        $usersDetails = User::where('user_type', '=', 'userAdmin')->get();
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
