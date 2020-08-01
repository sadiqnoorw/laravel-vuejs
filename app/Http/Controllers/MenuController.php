<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\RestoCategoryValidate;
use App\Services\MenuService;

use App\Models\{
	Category,
	Menu,
};
class MenuController extends Controller
{

    public function index($id)
    {
        $restoId = $id;
        $service = new MenuService;
        $menus = $service->getMenuWithCategory($restoId);

        return view('menu.menu-index', compact('menus', 'restoId'));
    }


    public function saveMenuItem(Request $request)
    {
    	$postData = $this->validate($request, [
    		'restoId' => 'required|numeric',
    		'price' => 'required|numeric',
            'item' => 'required',
    		'description' => 'required',
    		'category' => ['required', new RestoCategoryValidate(request('restoId'))],
    	]);

    	$category = Category::where(['resto_id' => $postData['restoId'], 'name' => $postData['category']])->first();


    	$menu = Menu::create([
    		'name' => $postData['item'],
    		'price' => $postData['price'],
    		'resto_id' => $postData['restoId'],
    		'description' => $postData['description'],
    		'category_id' => $category->id,
    	]);

    	return response()->json($menu, 201);
    }

    public function getRestoMenu(Request $request)
    {
        $this->validate($request, [
            'restoId' => 'required|exists:restaurants,id'
        ]);
        $menuItems = Menu::where('resto_id', $request->restoId)
            ->orderBy('category_id')
            ->get();

        return response()->json($menuItems, 200);
    }

}
