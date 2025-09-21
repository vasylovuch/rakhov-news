<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use PhpParser\Node\Expr\FuncCall;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        if (!auth()->check()) {
        return redirect()->route('choose'); // або login
    }
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $request->user()->news()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('news.index')
                        ->with('success', 'Новину додано успішно!');
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('news.index')
                         ->with('success', 'Новину оновлено успішно!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')
                         ->with('success', 'Новину видалено!');
    }

    public function choose() 
    {
        return view('auth.choose');
    }

    public function about() 
    {
        return view('news.about');
    }

}