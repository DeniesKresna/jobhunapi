<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 02 Mar 2020 15:44:03 +0700.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Slot
 * 
 * @property int $id
 * @property string $code
 * @property int $device_line_id
 * @property int $content_id
 * @property int $layout_box_id
 * @property int $campaign_id
 * @property int $box_id
 * @property int $car_id
 * @property int $driver_id
 * @property int $merchant_id
 * @property int $merchant_group_id
 * @property int $status
 * @property \Carbon\Carbon $start_time
 * @property \Carbon\Carbon $end_time
 *
 * @package App\Models
 */
class Slot extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'device_line_id' => 'int',
		'content_id' => 'int',
		'layout_box_id' => 'int',
		'campaign_id' => 'int',
		'box_id' => 'int',
		'car_id' => 'int',
		'driver_id' => 'int',
		'merchant_id' => 'int',
		'merchant_group_id' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'start_time',
		'end_time'
	];

	protected $fillable = [
		//'code',
		'device_line_id',
		'content_id',
		'layout_box_id',
		'campaign_id',
		'box_id',
		'car_id',
		'driver_id',
		'merchant_id',
		'merchant_group_id',
		'status',
		'start_time',
		'end_time'
	];

	public function device(){
		return $this->belongsTo("App\Models\Device");
	}

	public function content(){
		return $this->belongsTo("App\Models\Content");
	}

	public function layout_box(){
		return $this->belongsTO("App\Models\LayoutBox");
	}

	public function campaign(){
		return $this->belongsTo("App\Models\Campaign");
	}

	public function box(){
		return $this->belongsTo("App\Models\Box");
	}

	public function car(){
		return $this->belongsTo("App\Models\Car");
	}

	public function driver(){
		return $this->belongsTo("App\Models\Driver");
	}
}
