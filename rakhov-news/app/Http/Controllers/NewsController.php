<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    // Показати всі новини
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    // Показати форму створення новини
    public function create()
    {
        return view('news.create');
    }

    // Зберегти новину
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

    // Показати окрему новину
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    // Показати форму редагування
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    // Оновити новину
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

    // Видалити новину
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')
                         ->with('success', 'Новину видалено!');
    }
}
