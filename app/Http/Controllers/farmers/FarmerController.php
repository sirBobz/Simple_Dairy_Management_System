<?php

namespace App\Http\Controllers\farmers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MilkDetail;
use Auth;

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
        return view('farmer.dashboard');
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
