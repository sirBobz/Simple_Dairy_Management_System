<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MilkDetail;

class AdminController extends Controller
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
     * Show the admin users on the platform.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminUsers()
    {

        return view('admin.adminUsers');
    }
}
