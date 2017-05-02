<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 02 May 2017 22:34:45 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Produce
 * 
 * @property int $id
 * @property int $user_id
 * @property string $milk_weight
 * @property string $milk_condition
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
		'milk_weight',
		'milk_condition'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
