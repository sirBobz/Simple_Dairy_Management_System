<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 15 Apr 2017 05:38:02 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MilkDetail
 * 
 * @property int $id
 * @property int $user_id
 * @property string $milk_weight
 * @property string $milk_Rate
 * @property string $total_Amount
 * @property string $milk_condition
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class MilkDetail extends Eloquent
{
	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'milk_weight',
		'milk_Rate',
		'total_Amount',
		'milk_condition'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
