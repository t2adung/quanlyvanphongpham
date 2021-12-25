<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Access\Gate;
use App\Product;

class ProductController extends Controller
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
    public function index()
    {
        $personal_products = Product::where('type', config('constants.ORDER_PERSONAL'))->orderBy('name')->get();
        $department_products = Product::where('type', config('constants.ORDER_DEPARTMENT'))->orderBy('name')->get();

        return view('product', [
            'personal_products' => $personal_products,
            'department_products' => $department_products
        ]);
    }

    public function create()
    {
        
    }

    public function update() 
    {

    }
}
