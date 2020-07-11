<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(MenuService $service)
    {
        $restoId = 1;
        $menus = $service->getMenuWithCategory($restoId);
        
        return view('home', compact('menus', 'restoId'));
    }
}
