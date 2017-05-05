<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 03 May 2017 18:00:52 +0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Setting
 * 
 * @property int $id
 * @property string $milk_rate
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 *
 * @package App\Models
 */
class Setting extends Eloquent
{
	protected $table = 'settings';
	
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'milk_rate'
	];
}
