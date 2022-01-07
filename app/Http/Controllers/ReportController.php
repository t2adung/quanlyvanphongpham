<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
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
    public $dept_products_arr;
    public $per_products_arr;

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

        $this->getProducts();

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
        ]);
    }

    public function getProducts() 
    {
        $all_products = Product::orderBy('name')->get();
        $this->products_arr = [];
        foreach ($all_products as $product) {
            $this->products_arr[$product->id] = $product->name;
            if ($product->type == config('constants.ORDER_DEPARTMENT')) {
                $this->dept_products_arr[$product->id] = $product->name;
            } else {
                $this->per_products_arr[$product->id] = $product->name;
            }
        }
    }

    public function export(Request $request) 
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

        $this->getProducts();

        if ($type ==  1) {
            $data = $this->getExportDataByProducts($all_orders);
            $data['month'] = $month;
            $data['year'] = $year;
            $data['export_pdf'] = !empty($request->exportPdf) ?  true : false;
            $ext = !empty($request->exportPdf) ?  'pdf' : 'xlsx';
            $export = new ProductExport($data);
            return Excel::download($export, "bao_cao_vpp_$month$year.$ext");
        } else {
            $data = $this->getExportDataByUsers($all_orders);
            $export = new UserExport($data);
            return Excel::download($export, "bao_cao_vpp_theo_nv_$month$year.xlsx");
        }
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
            'products' => $this->products_arr
        ];
    }

    public function getExportDataByUsers($all_orders) 
    {
        $dep_prods = [];
        $per_prods = [];
        $descriptions = [];
        foreach ($all_orders as $order) {
            foreach ($order->products as $product) {
                if ($order->type == config('constants.ORDER_DEPARTMENT')) {
                    $dep_prods[$order->user_id][$product->product_id] = $product->quantity;
                } else {
                    $per_prods[$order->user_id][$product->product_id] = $product->quantity;
                }
            }
            $descriptions[$order->user_id]= $order->description;
        }

        $users = User::all(['id', 'name']);
        $this->users_arr = [];
        foreach ($users as $user) {
            $this->users_arr[$user->id] = $user->name;
        }

        return [
            'department_products' => $dep_prods,
            'personal_products' => $per_prods,
            'descriptions' => $descriptions,
            'users' => $this->users_arr,
            'dept_products_arr' => $this->dept_products_arr,
            'per_products_arr' => $this->per_products_arr
        ];
    }

    private function calProducts($total_products, $products)
    {
        foreach ($products as $product) {
            if (isset($total_products[$product->product_id])) {
                $total_products[$product->product_id]['quantity'] += $product->quantity;
            } else {
                $total_products[$product->product_id]['quantity'] = $product->quantity;
            }      
        }

        return $total_products;
    }
}
