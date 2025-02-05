<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Order;
class OrderController extends Controller
{
    //index
    public function index(Request $request)
    {
  $query = Order::query();

    // Filter berdasarkan tanggal transaksi
    if ($request->has('transaction_time') && $request->transaction_time) {
        $query->whereDate('transaction_time', $request->transaction_time);
    }

    // Filter berdasarkan nama kasir
    if ($request->has('kasir') && $request->kasir) {
        $query->whereHas('kasir', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->kasir . '%');
        });
    }

    $orders = $query->paginate(10);

    // return view('orders.index', compact('orders'));



        // $orders = \App\Models\Order::with('kasir')->orderBy('created_at', 'desc')->paginate(10);

        return view('pages.orders.index', compact('orders'));
    }

    //view
    public function show($id)
    {
        $order = \App\Models\Order::with('kasir')->findOrFail($id);

        //get order items by order id
        $orderItems = \App\Models\OrderItem::with('product')->where('order_id', $id)->get();


        return view('pages.orders.view', compact('order', 'orderItems'));
    }
}
