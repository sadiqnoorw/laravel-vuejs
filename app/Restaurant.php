<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $guarded = [];

    /**
     * [return restaurent owner]
     */
    public function owner()
    {
    	return $this->belongsTo(User::class, 'owner_id');
    }
}
