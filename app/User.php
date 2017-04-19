<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
