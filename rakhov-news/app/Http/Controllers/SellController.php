<?php

namespace App\Http\Controllers;

use App\Models\Sellit;
use Illuminate\Http\Request;

class SellController extends Controller
{
    public function index(Request $request)
{
    $query = Sellit::query();

    if ($request->filled('query')) {
        $search = trim($request->input('query'));
        $query->where(function($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('location', 'like', "%{$search}%");
        });
    }

    if ($request->filled('category')) {
        $query->where('category', $request->input('category'));
    }

    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->input('min_price'));
    }

    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->input('max_price'));
    }

    if ($request->filled('location')) {
        $location = trim($request->input('location'));
        $query->where('location', 'like', "%{$location}%");
    }

    // Сортування
    if ($request->filled('sort')) {
        switch ($request->input('sort')) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'date_asc':
                $query->orderBy('created_at', 'asc');
                break;
            case 'date_desc':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }
    } else {
        // За замовчуванням — новіші зверху
        $query->orderBy('created_at', 'desc');
    }

    $sellits = $query->get();

    return view('news.sell_index', compact('sellits'));
}


    public function create()
    {
        return view('news.sellit_create');
    }



    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'phone' => 'required|string',
            'location' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }

        $data['user_id'] = auth()->id();

        Sellit::create($data);

        return redirect()->route('sellit.index')->with('success', 'Оголошення додано!');
    }


    public function my()
    {
        $sellits = Sellit::where('user_id', auth()->id())->get();
        return view('news.my', compact('sellits'));
    }
}
