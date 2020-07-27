<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{
        Order,
        User
    };

class Restaurant extends Model
{
    protected $guarded = [];

    protected $appends = ['slug', 'odersSlug'];
    
    /**
     * [return restaurent owner]
     */
    public function owner()
    {
    	return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * 
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'resto_id');
    }

    /**
     * [create custom url for restos menu by id field]
     * @return [type] [description]
     */
    public function getSlugAttribute()
    {
    	return route('restos.menu', $this->id);
    }

    /**
     * [create custom url for  menu orders by id]
     * @return [type] [description]
     */
    public function getOdersSlugAttribute()
    {
        return route('resto.orders', $this->id);
    }
}
