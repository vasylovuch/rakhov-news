<?php

namespace App\Http\Controllers;

use App\Models\Sellit;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $sell = Sellit::findOrFail($id);

        if ($sell->user_id === auth()->id()) {
            return redirect()->back()->with('error', 'Не можна додати в кошик своє оголошення!');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "title" => $sell->title,
                "price" => $sell->price,
                "image" => $sell->image ? asset('storage/'.$sell->image) : "https://via.placeholder.com/150",
                "quantity" => 1,
                "user_id" => $sell->user_id, 
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Товар додано у кошик!');
    }


    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Товар видалено з кошика!');
    }

    
}
