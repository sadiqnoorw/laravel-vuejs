<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $guarded = [];

    protected $appends = ['slug'];
    
    /**
     * [return restaurent owner]
     */
    public function owner()
    {
    	return $this->belongsTo(User::class, 'owner_id');
    }

    public function getSlugAttribute()
    {
    	return route('restos.menu', $this->id);
    }
}
