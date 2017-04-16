<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MilkDetail;
use Illuminate\Http\Request;

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
     * Update farmer's milk produce
     *
     * @return void
     */
    public function updateProduce()
    {

        //return view('admin.adminUsers');
    }
}
