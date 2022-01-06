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

    public function create(Request $request)
    {
        $product_name = $request->name;
        $type = $request->type;
        if (empty($product_name) || empty($type)) { 
            return redirect()->route('products')->with(['error' => 'Có lỗi xảy ra. Xin vui lòng thử lại.']);
        }

        try {
            $product = [
                'name' => $product_name,
                'type' => $type
            ];
            
            if (Product::create($product)) {
                return redirect()->route('products')->with(['success' => 'Đăng ký thành công.']);
            };
            
        } catch (\Exception $e) {
            return redirect()->route('products')->with(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request) 
    {
        $product_name = $request->name;
        $product_id = $request->id;

        if (empty($product_id)) { 
            return redirect()->route('products')->with(['error' => 'Có lỗi xảy ra. Xin vui lòng thử lại.']);
        }

        try {
            $product = Product::find($product_id);
            if (empty($product)) {
                return redirect()->route('products')->with(['error' => 'Có lỗi xảy ra. Xin vui lòng thử lại.']);
            }
            if (!empty($request->delete)) {
                $product->type = 0;
            } else {
                $product->name = $product_name;
            }
                
            if ($product->save()) {
                return redirect()->route('products')->with(['success' => 'Cập nhật thành công.']);
            };
            
        } catch (\Exception $e) {
            return redirect()->route('products')->with(['error' => $e->getMessage()]);
        }
    }
}
