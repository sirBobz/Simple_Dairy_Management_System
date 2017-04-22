<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB, Validator, Log, Auth;
use App\Models\MilkDetail;
use Datatables;
use PDF;


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
        Route::any('/search',function(){
        $q = Input::get ( 'q' );

        $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();

        if(count($user) > 0)
            return view('welcome')->withDetails($user)->withQuery ( $q );
        else return view ('welcome')->withMessage('No Details found. Try to search again !');
        });
        //return view('admin.searchFarmer');
    }


    public function validateFormRequest(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'milk_weight' => 'required|numeric|max:150',
            'milk_condition' => 'required|max:191',
            'user_id' => 'required|max:50',
            'milk_Rate'=> 'required|numeric|max:100',
            ]);

        if ($validator->fails()) 
        {
        return redirect('/organization/return-view/farmers-details')
             ->withErrors($validator)
             ->withInput();
        } 

        $milk_weight = $request->milk_weight; 
        $milk_condition = $request->milk_condition; 
        $user_id = $request->user_id;
        $milk_Rate = $request->milk_Rate;

        $this->updateFarmerProduce($milk_weight, $milk_condition, $user_id, $milk_Rate);
        return redirect('/organization/return-view/farmers-details')->with('message', 'Set Successful!');

    }

    public function updateFarmerProduce($milk_weight, $milk_condition, $user_id, $milk_Rate)
    {
        $total_Amount = $milk_Rate * $milk_weight;

        //Get account Details
        $farmerDetails = User::where('id', '=', $user_id)->first();
        $farmerId = $farmerDetails->id_number;
        $farmerDairyNum = $farmerDetails->farmer_dairy_no;
        $farmer_First_Name = $farmerDetails->first_name;
        $farmer_second_Name = $farmerDetails->second_name;

        $farmerName = "$farmer_First_Name $farmer_second_Name";

        //Create a new milk detail Instance
        $milkDetails = MilkDetail::create
             ([
              'farmer_ID'=>$farmerId,
              'milk_Rate'=>$milk_Rate, 
              'total_Amount'=>$total_Amount, 
              'milk_weight'=>$milk_weight, 
              'milk_condition'=>$milk_condition,
              'user_id'=> $user_id,
              'farmerDairyNum'=>$farmerDairyNum,
              'farmerName'=>$farmerName,
              ]); 

        $this->updateTotalProduce($user_id, $milk_weight);                       
    }

    public function updateTotalProduce($user_id, $milk_weight)
    {
      $farmerDetails = User::where('id', '=', $user_id)->first();
      $farmer_total_milk = $farmerDetails->total_milk;

      $updated_total_milk = $farmer_total_milk + $milk_weight;
      
      
       User::where('id', '=', $user_id)
          ->update
          ([
            'total_milk' => $updated_total_milk
          ]);
    }


    public function pdfview(Request $request)
    {
        $start = date("Y-m-d",strtotime($request->input('from_date')));
        $end = date("Y-m-d",strtotime($request->input('to_date')."+1 day"));
        
        $items = DB::table("milkDetails")->whereBetween('created_at',[$start, $end])->get();
        view()->share('items',$items);

        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
        }

        return view('Downloads.adminPdf');
    }

    public function deleteProduceRecord($id, Request $request)
    {
     $userEmail = Auth::user()->email;

     $user_milk_Details = MilkDetail::find($id);
     $user_milk_Details->delete();
     
     return redirect('/organization/return-view/farmers-produce')->with('message', 'Details Deleted Successfully');

    }
}
