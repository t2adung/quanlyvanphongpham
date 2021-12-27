<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;
use App\OrderProduct;

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

    public function order(Request $request)
    {
        $product_ids = $request->product_ids;
        $product_quantities = $request->quantities;
        $type = $request->type;
        $month = $request->month;
        $year = $request->year;

        $data = [];
        if (empty($product_ids) || empty($product_quantities) || empty($type) || empty($month) || empty($year)) { 
            return redirect()->route('orders', ['type' => $type])->with(['error' => 'Có lỗi xảy ra. Xin vui lòng thử lại.']);
        }

        try {
            $order = [
                'user_id' => Auth::id(),
                'month' => $month, 
                'year' => $year,
                'type' => $type
            ];
    
            $order = Order::firstOrCreate($order);
    
            if (!empty($order)) {
                foreach ($product_ids as $key => $id) {
                    $order_products = [];
                    $order_products['order_id'] = $order->id;
                    $order_products['product_id'] = $id;
                    $order_products['quantity'] = $product_quantities[$key];
    
                    $order_products = OrderProduct::updateOrCreate($order_products);
                }
            }

            return redirect()->route('orders', ['type' => $type])->with(['success' => 'Đăng ký thành công.']);
        } catch (\Exception $e) {
            return redirect()->route('orders', ['type' => $type])->with(['error' => $e->getMessage()]);
        }
    }
}
