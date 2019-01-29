<?php

namespace App\Http\Controllers;
use App\Order;
use App\Customer;
use App\Product;
use App\StorageLocation;

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
    public function index()
    {
        // get recent orders
        $orders = Order::orderBy('id', 'DESC')->take(10)->get();

        // get counts
        $counts = [
          'product_count' => Product::all()->count(),
          'customer_count' => Customer::all()->count(),
          'order_count' => Order::all()->count(),
          'storage_location_count' => StorageLocation::all()->count()
        ];

        return view('home')->with('orders', $orders)->with('counts', $counts);
    }
}
