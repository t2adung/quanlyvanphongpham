<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($type = null)
    {
        if (empty($type)) {
            $type = 1;
        }
        return view('product', ['type' => $type]);
    }

    public function create()
    {
        
    }

    public function update() 
    {

    }
}
