<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 03 May 2017 06:29:00 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Produce
 * 
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $milk_weight
 * @property string $milk_condition
 * @property string $farmer_ID
 * @property string $farmerDairyNum
 * @property string $total_milk_weight
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Produce extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'name',
		'milk_weight',
		'milk_condition',
		'farmer_ID',
		'farmerDairyNum',
		'total_milk_weight'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
