<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Log;


class AuthLogController extends Controller
{
    public function userAuth(Request $request)
    {     
      $userLevel = Auth::user()->user_type; //get user type
      $userEmail = Auth::user()->email; //get user email 
      $ip = $request->ip(); //Get user Ip Address

        switch($userLevel)
        {
          case "userAdmin":
               Log::Info("User $userEmail logged in to the ADMIN Account from $ip");
              return redirect('/organization/return-view/admin-dashboard');
              break;

          case "userMilkFarmer":
               Log::Info("User $userEmail logged in to the Farmer Account from $ip");
              return redirect('/organization/return-view/farmer-dashboard');
              break;
   
          default:
               Log::Info('ALERT! This case has been Logged: No User Type Found------> Attempt from $ip');
              return redirect('login');
              break;
        }


    }
}
