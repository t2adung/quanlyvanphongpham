<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

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
    public function index($type = null)
    {
        if ($type == null) {
            $type = 1;
        }

        // get products
        $products = Product::where('type', $type)->orderBy('name')->get();

        return view('home', [
            'type' => $type,
            'products' => $products,
            'current_month' => date('m'),
            'current_year' => date('Y'),
        ]);
    }

    public function order($type)
    {
        return view('home');
    }
}
