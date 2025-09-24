<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'comment' => 'nullable|string|max:500',
        ]);

        $cart = session()->get('cart', []);
        $id = $request->input('id');

        if (!isset($cart[$id])) {
            return redirect()->route('cart.index')->with('error', 'Товар не знайдено у кошику.');
        }

        $item = $cart[$id];
        $sellerId = $item['user_id'];

        $orderItems = [];
        foreach ($cart as $key => $product) {
            if ($product['user_id'] == $sellerId) {
                $orderItems[$key] = $product;
                unset($cart[$key]); 
            }
        }
        session()->put('cart', $cart);

        Order::create([
            'user_id' => auth()->id(),
            'items' => json_encode($orderItems),
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'comment' => $request->comment,
        ]);

        return redirect()->route('orders.index')->with('order_success', 'Замовлення успішно оформлено!');
    }

    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('order.index', compact('orders'));
    }

    public function create($id)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return redirect()->route('cart.index')->with('error', 'Товар не знайдено у кошику.');
        }

        $item = $cart[$id];

        return view('order.create', compact('item', 'id'));
    }

}
