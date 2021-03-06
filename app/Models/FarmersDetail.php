<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 03 May 2017 18:00:52 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class FarmersDetail
 * 
 * @property int $id
 * @property int $user_id
 * @property string $farmerDairyNum
 * @property string $total_milk_weight
 * @property string $farmer_ID
 * @property string $box_number
 * @property string $postal_town
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class FarmersDetail extends Eloquent
{
	protected $table = 'farmers_Details';
	
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'farmerDairyNum',
		'total_milk_weight',
		'farmer_ID',
		'box_number',
		'postal_town'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
