<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $articles = Article::where('published', '=', 1)->orderBy('created_at', 'desc')->get();

        if(request()->has('search')) {
            $articles = $articles->where('title', 'like', '%' . $request->input('search') . '%');
            //$articles = $articles->where('title', 'like', '%' . request('search') . '%');
        }

        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // GET
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // POST
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
        ], [
            'title.required' => 'Add a title!',
        ]);

        $article = new Article();

        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->image = $request->input('image');
        $article->category_id = $request->input('category_id');
        $article->user_id = auth()->user()->id;

        $article->save();

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article = Article::find($article->id);
        return view('articles.show',
            ['article' => $article]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Article $article): RedirectResponse
    {
        Gate::authorize('update', $article);
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        Gate::authorize('update', $article);
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:2000',
        ], [
            'title.required' => 'Add a title!',
        ]);

        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->image = $request->input('image');
        $article->category_id = $request->input('category_id');
        $article->user_id = auth()->user()->id;

        $article->update();

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Gate::authorize('delete', $article);
        $article->delete();

        if (auth()->user()->is_admin) {
            return redirect()->route('admin.index');
        }
        return redirect()->route('articles.index');
    }

}
