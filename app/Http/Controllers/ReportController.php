<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public $products_arr;
    public $users_arr;

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
        return view('report.index', [
            'current_month' => date('m'),
            'current_year' => date('Y'),
        ]);
    }

    public function confirm(Request $request)
    {
        $type = $request->type;
        $month = $request->month;
        $year = $request->year;

        $data = [];
        if (empty($type) || empty($month) || empty($year)) { 
            return redirect()->route('reports', ['type' => $type])->with(['error' => 'Có lỗi xảy ra. Xin vui lòng thử lại.']);
        }

        $all_orders = Order::where(['month' => $month, 'year' => $year])->orderBy('created_at')->get();
        if (count($all_orders) == 0) {
            return redirect()->route('reports', ['type' => $type])->with(['error' => 'Data không tìm thấy']);
        }

        $products = Product::orderBy('name')->get();
        $this->products_arr = [];
        foreach ($products as $product) {
            $this->products_arr[$product->id] = $product->name;
            if ($product->type == config('constants.ORDER_DEPARTMENT')) {
                $department_products[$product->id] = $product->name;
            } else {
                $personal_products[$product->id] = $product->name;
            }
        }

        if ($type ==  1) {
            $data = $this->getExportDataByProducts($all_orders);
        } else {
            $data = $this->getExportDataByUsers($all_orders);
        }

        return view('report.confirm', [
            'type' => $type, 
            'month' => $month, 
            'year' => $year,
            'data' => $data,
            'products' => $this->products_arr,
            'department_products' => $department_products,
            'personal_products' => $personal_products,
        ]);
    }

    public function export($type, $year, $month) 
    {
        //return Excel::download(new UserExport, 'users.xlsx');
    }

    public function getExportDataByProducts($all_orders) 
    {
        $dep_prods = [];
        $per_prods = [];
        foreach ($all_orders as $order) {
            $order_prods = $order->products;
            if ($order->type == config('constants.ORDER_DEPARTMENT')) {
                $dep_prods = $this->calProducts($dep_prods, $order_prods);
            } else {
                $per_prods = $this->calProducts($per_prods, $order_prods);
            }
        }

        return [
            'department_products' => $dep_prods,
            'personal_products' => $per_prods,
        ];
    }

    public function getExportDataByUsers($all_orders) 
    {
        $dep_prods = [];
        $per_prods = [];
        foreach ($all_orders as $order) {
            foreach ($order->products as $product) {
                if ($order->type == config('constants.ORDER_DEPARTMENT')) {
                    $dep_prods[$order->user_id][$product->product_id] = $product->quantity;
                } else {
                    $per_prods[$order->user_id][$product->product_id] = $product->quantity;
                }
            }
        }

        $users = User::all(['id', 'name']);
        $this->users_arr = [];
        foreach ($users as $user) {
            $this->users_arr[$user->id] = $user->name;
        }

        return [
            'department_products' => $dep_prods,
            'personal_products' => $per_prods,
            'users' => $this->users_arr,
        ];
    }

    private function calProducts($total_products, $products)
    {
        foreach ($products as $product) {
            if (isset($total_products[$product->product_id])) {
                $total_products[$product->product_id]['quantity'] += $product->quantity;
            } else {
                $total_products[$product->product_id]['quantity'] = $product->quantity;
                //$total_products[$product->product_id]['name'] = $this->products_arr[$product->product_id];
            }      
        }

        return $total_products;
    }
}
