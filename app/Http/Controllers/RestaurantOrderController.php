<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\{
		Restaurant,
		Order,
        Models\Menu
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
                ->orderByDesc('created_at')
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
        $postData = $this->validate($request, [
            'resto_id' => 'required|exists:restaurants,id',
            'order_data' => 'required|array',
        ]);

        $itemIds = $request['order_data']['orderedItems'];
        try {
            DB::beginTransaction();
            $orderTotal = 0;
            foreach ($itemIds as $id) {
                $menu = Menu::where(['resto_id' => $postData['resto_id'], 'id' => $id ])
                        ->first();
                
                if($menu){
                    $orderTotal += $menu->price; 
                }            
            }  

            $postedDate = [
                'resto_id' => $postData['resto_id'],
                'user_id' => Auth::id(),
                'amount' => $orderTotal,
                'isComplete' => 0,
                'order_details' => [
                    'items' => $postData['order_data']['orderedItems'],
                    'customer_name' => $postData['order_data']['customerDetails']['name'], 
                    'customer_phone' => $postData['order_data']['customerDetails']['phone'],
                    'customer_address' => $postData['order_data']['customerDetails']['address']
                ]
            ];
           
            Order::create($postedDate);
            
          DB::commit();
        } catch (Exception $e) {

            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }

        return $request->all();
    }
}
