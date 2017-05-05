<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MilkDetail;
use Datatables;
use DB, Auth, Validator;
use Carbon\Carbon;
use App\Models\Setting;


class SuperAdminProcessingController extends Controller
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
   public function validateFormRequest(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'milk_rate'=> 'required|numeric|max:150',
            ]);

        if ($validator->fails()) 
        {
        return redirect('/organization/return-view/settings')
             ->withErrors($validator)
             ->withInput();
        }

        $milk_Rate = $request->milk_rate;

        $this->updateSetting($milk_Rate);
        return redirect('/organization/return-view/settings')->with('message', 'Set Successful!');

    }

    public function updateSetting($milk_Rate)
    {

       $Setting = Setting::updateOrCreate(
               ['milk_rate' => $milk_Rate]);

    }

  
}
