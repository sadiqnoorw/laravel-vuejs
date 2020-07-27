<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;

class Order extends Model
{
	protected $guarded = [];

	protected $casts = [
		'order_details' => 'array'
	];

	public function restaurant()
	{
		return $this->belogsTo(Restaurant::class, 'resto_id');
	}

}
