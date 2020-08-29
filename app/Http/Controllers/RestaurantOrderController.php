<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
		Restaurant,
		Order
	};

class RestaurantOrderController extends Controller
{
    
    public function index($id)
    {
    	$resto = Restaurant::find($id);

    	if (!$resto) {
    		abort(404, "This Restaurant you are looking for is not present");
    	}

    	$orders = Order::where('resto_id', $id)
                ->orderBy('isComplete')
                ->paginate(20);

    	return view('orders.order-index', compact('resto', 'orders'));
    }

    public function add($id)
    {
        $resto = Restaurant::findOrFail($id);
        
        return view('orders.order-add', compact('resto'));
    }

    public function store(Request $request)
    {
        logger($request->all());
        return $request->all();
    }
}
