<?php

namespace App\Http\Controllers;

use App\Models\Sellit;
use Illuminate\Http\Request;

class SellController extends Controller
{
    public function index(Request $request)
{
    $query = Sellit::query();

    // Пошук за назвою, описом або містом (всі разом)
    if ($request->filled('query')) {
        $search = trim($request->input('query'));
        $query->where(function($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('location', 'like', "%{$search}%");
        });
    }

    // Фільтр по категорії
    if ($request->filled('category')) {
        $query->where('category', $request->input('category'));
    }

    // Мінімальна ціна
    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->input('min_price'));
    }

    // Максимальна ціна
    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->input('max_price'));
    }

    // Окремий фільтр по місцезнаходженню (якщо введено)
    if ($request->filled('location')) {
        $location = trim($request->input('location'));
        $query->where('location', 'like', "%{$location}%");
    }

    $sellits = $query->orderBy('created_at', 'desc')->get();

    return view('news.sell_index', compact('sellits'));
}



    public function create()
    {
        return view('news.sellit');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'image' => 'nullable|image',
        'category' => 'required|string',
        'phone' => 'required|string|max:20',       // номер телефону
        'location' => 'required|string|max:255',   // місце знаходження (село/місто)
    ]);

    // Збереження фото, якщо є
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('uploads', 'public');
    }

    // Збереження в базу
    Sellit::create($data);

    return redirect()->route('sellit.index')->with('success', 'Оголошення додано!');
}

}
