<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Produce;
use App\Models\FarmersDetail;
use DB, Validator, Log, Auth;
use App\Models\MilkDetail;
use Datatables;
use App\Models\Setting;
use PDF;
use App\Mail\welcome;



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
     * Processing the Register Farmer.
     *
     * @return \Illuminate\Http\Response
     */
    public function RegisterFarmer(Request $request)
    {
       $validator = Validator::make($request->all(), 
          [
            'first_name' => 'required|string|max:150',
            'second_name' => 'required|string|max:191',
            'farmer_ID' => 'required|string|max:10|unique:farmers_Details',
            'gender'=> 'required|string|max:10',
            'email' => 'required|email|max:150|unique:users',
            'farmerDairyNum' => 'required|string|max:10|unique:farmers_Details',
            'box_number' => 'required|string|max:10',
            'postal_town'=> 'required|string|max:15',
            'user_type'=>'required|string|max:15',
          ]);

        if ($validator->fails()) 
        {
        return redirect('/organization/return-view/farmers-details')
             ->withErrors($validator)
             ->withInput();
        }

      $first_name = $request->first_name;
      $second_name = $request->second_name;
      $id_number = $request->farmer_ID;
      $gender = $request->gender;
      $email = $request->email;
      $farmer_dairy_no = $request->farmerDairyNum;
      $box_number = $request->box_number;
      $postal_town = $request->postal_town;
      $user_type = $request->user_type;

      $this->updateNewRegistry($first_name, $second_name, $id_number,  $gender, $email, $farmer_dairy_no, $box_number, $postal_town, $user_type);
      return redirect('/organization/return-view/farmers-details')->with('message', 'Created Successful!');
    }

    public function updateNewRegistry($first_name, $second_name, $id_number, $gender, $email, $farmer_dairy_no, $box_number, $postal_town, $user_type)
    {

        //create a new user instance
        $user = new User;
        $user->user_type = $user_type; 
        $user->first_name = $first_name;
        $user->second_name = $second_name;
        $user->gender = $gender;
        $user->password = bcrypt('password'); //default password = password
        $user->email = $email;
        $user->save();

       // \Mail::to($user)->send(new welcome($user));

        //Get User Id
        $userId = $user->id;

        //Create new FarmersDetail instance
        $farmer = new FarmersDetail;
        $farmer->user_id = $userId;
        $farmer->farmerDairyNum = $farmer_dairy_no;
        $farmer->farmer_ID = $id_number;
        $farmer->box_number = $box_number;
        $farmer->postal_town = $postal_town;
        $farmer->save();


    }

    public function validateFormRequest(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'milk_weight' => 'required|numeric|max:150',
            'milk_condition' => 'required|max:191',
            'user_id' => 'required|max:50',            
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

        $this->updateFarmerProduce($milk_weight, $milk_condition, $user_id);
        return redirect('/organization/return-view/farmers-details')->with('message', 'Set Successful!');

    }

    public function updateFarmerProduce($milk_weight, $milk_condition, $user_id)
    {
      $UserDetails = User::where('id', '=', $user_id)->firstorfail();
      $farmerFirstName = $UserDetails->first_name; 
      $farmerSecondName = $UserDetails->second_name;
      $name = "$farmerFirstName  $farmerSecondName";

       $farmersMilkWeight = FarmersDetail::where('user_id', '=', $user_id)->value('total_milk_weight');
       $new_weight = $farmersMilkWeight + $milk_weight;

       FarmersDetail::where('user_id', $user_id)
                   ->update(['total_milk_weight' => $new_weight]);


      $FarmerDetail = FarmersDetail::where('user_id', '=', $user_id)->firstorfail();
      $total_milk_weight = $FarmerDetail->total_milk_weight;
      $farmerDairyNum = $FarmerDetail->farmerDairyNum;
      $farmer_ID = $FarmerDetail->farmer_ID;



       $produce = new Produce;  
       $produce->user_id = $user_id;
       $produce->name = $name;
       $produce->total_milk_weight = $total_milk_weight;
       $produce->farmerDairyNum = $farmerDairyNum;
       $produce->farmer_ID = $farmer_ID;
       $produce->milk_weight = $milk_weight;
       $produce->milk_condition = $milk_condition;
       $produce->save();

       

   }


    public function pdfview(Request $request)
    {
        $start = date("Y-m-d",strtotime($request->input('from_date')));
        $end = date("Y-m-d",strtotime($request->input('to_date')."+1 day"));
        
        $items =DB::table('milkDetails')
                 ->select(DB::raw('farmerName, farmer_ID, farmerDairyNum, sum(milk_weight) as total_milk,  sum(total_Amount) as amount'))
                 ->groupBy('farmerDairyNum', 'farmerName', 'farmer_ID')
                 ->get();
        view()->share('items',$items);

        if($request->has('download')){
            $pdf = PDF::loadView('Downloads.adminPdf');
            return $pdf->download('pdfview.pdf');
        }

        return view('Downloads.adminPdf');
    }

    public function deleteProduceRecord($id, Request $request)
    {
     $userEmail = Auth::user()->email;

     $user_milk_Details = Produce::find($id);
     $user_milk_Details->delete();

     \Log::Info("USER EMAIL $userEmail deleted the record ID $id from MilkDetail Model"); 
     
     return redirect('/organization/return-view/farmers-produce')->with('message', 'Details Deleted Successfully');

    }
}
