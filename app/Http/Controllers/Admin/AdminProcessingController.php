<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MilkDetail;
use Datatables;
use DB;

class AdminProcessingController extends Controller
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
     * Processing the search functionality.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchFarmer(Request $request)
    {
        //return view('admin.searchFarmer');
    }

    
}
