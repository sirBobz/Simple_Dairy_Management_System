<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use Mail;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/userAuth';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_type'=>'required|string|max:40',
            'first_name' => 'required|string|max:55',
            'second_name' => 'required|string|max:55',
            'third_name' => 'required|string|max:55',
            'gender' => 'required|string|max:6',
            'id_number' => 'required|numeric',
            'box_number' => 'required|numeric',
            'zip_code' => 'required|numeric',
            'postal_town' => 'required|string',
            'email' => 'required|email|max:55|unique:users',
            'farmer_dairy_no' => 'required|numeric|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration with a random email token.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
         
        return User::create
        ([
            'user_type'=>$data['user_type'],
            'first_name' => $data['first_name'],
            'second_name' => $data['second_name'],
            'third_name' => $data['third_name'],
            'gender' => $data['gender'],
            'id_number' => $data['id_number'],
            'box_number' => $data['box_number'],
            'zip_code' => $data['zip_code'],
            'postal_town' => $data['postal_town'],
            'email' => $data['email'],
            'password' => bcrypt('password'), //default password = password
            'email_token' => str_random(10), 
            'farmer_dairy_no'=> $data['farmer_dairy_no'],     
        ]);

         
    }


     public function register(Request $request)
    {

        // Laravel validation
        $validator = $this->validator($request->all());
        if ($validator->fails()) 
        {   \Log::Info('Validator Fails');
            $this->throwValidationException($request, $validator);
        }
        
        // Using database transactions is useful here because stuff happening is actually a transaction
        // I don't know what I said in the last line! Weird!
        DB::beginTransaction();
        try
        {
            \Log::Info('Reached Here!');
            $user = $this->create($request->all());
            
            // After creating the user send an email with the random token generated in the create method above
            $email = new EmailVerification(new User(['email_token' => $user->email_token, 'first_name' => $user->first_name, 'second_name' => $user->second_name]));
            
            Mail::to($user->email)->send($email);
            \Log::Info('Email sent to Registered User $email');

            DB::commit();
            return back();
        }

        catch(Exception $e)
        {

            \Log::Info('Exception while Registering:  $e');

            DB::rollback(); 
            return back();
        }
    }


      // Get the user who has the same token and change his/her status to verified i.e. 1
      public function verify($token)
      {
      
        // The verified method has been added to the user model and chained here
        // for better readability
      
        User::where('email_token',$token)->firstOrFail()->verified();
      
        return redirect('login');
      }
}
