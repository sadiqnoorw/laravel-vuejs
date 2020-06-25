<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Menu extends Model
{
	//return menu with categories
	protected $with = ['category'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
