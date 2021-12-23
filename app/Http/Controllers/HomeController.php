<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
        
        return view('home', [
            'type' => $type,
        ]);
    }

    public function order($type)
    {
        return view('home');
    }
}
