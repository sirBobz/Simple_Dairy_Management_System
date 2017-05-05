<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 02 May 2017 05:54:41 +0300.
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property int $id
 * @property string $user_type
 * @property string $first_name
 * @property string $second_name
 * @property string $gender
 * @property string $email
 * @property string $password
 * @property int $verified
 * @property string $email_token
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $farmers__details
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    protected $table = 'users';

    use Notifiable;
    
    protected $casts = [
        'verified' => 'int'
    ];

    protected $hidden = [
        'password',
        'email_token',
        'remember_token'
    ];

    protected $fillable = [
        'user_type',
        'first_name',
        'second_name',
        'gender',
        'email',
        'password',
        'verified',
        'email_token',
        'remember_token'
    ];

    public function farmers__details()
    {
        return $this->hasMany(\App\Models\FarmersDetail::class);
    }
}
