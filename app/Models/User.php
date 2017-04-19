<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 15 Apr 2017 05:38:02 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property \Illuminate\Database\Eloquent\Collection $milk_details
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'user_type',
		'first_name',
		'second_name',
		'third_name',
		'gender',
		'id_number',
		'email',
		'box_number',
		'zip_code',
		'postal_town',
		'farmer_dairy_no',
		'total_milk',
		'password',
		'remember_token',
		'email_token',
		'verified' 
	];

	public function milk_details()
	{
		return $this->hasMany(\App\Models\MilkDetail::class);
	}

	// Set the verified status to true and make the email token null
	public function verified()
	{
	    $this->verified = 1;
	    $this->email_token = null;
	    $this->save();
	}
}
