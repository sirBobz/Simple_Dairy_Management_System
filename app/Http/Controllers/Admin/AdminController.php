<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MilkDetail;
use Datatables;

class AdminController extends Controller
{
    /**
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
     * Show the farmers Details.
     *
     * @return \Illuminate\Http\Response
     */
    public function farmersDetails()
    {
        $usersDetails = User::where('user_type', '=', 'userMilkFarmer')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.farmersDetails', 
            [
             'usersDetails'=>$usersDetails,
            ]);
    }


     
    /**
     * Show the farmers Produce.
     *
     * @return \Illuminate\Http\Response
     */
    public function farmersProduce()
    {
       
       return view('admin.farmersProduce');
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
     * Show the admin users on the platform.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminUsers()
    {

        return view('admin.adminUsers');
    }
}
