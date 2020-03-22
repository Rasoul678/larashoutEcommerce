<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{

    public function index(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        $orders = Order::all($columns, $order, $sort);

        return view('admin.orders.index', compact('orders'));
    }

    public function show($orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)->first();

        return view('admin.orders.show', compact('order'));
    }

}
