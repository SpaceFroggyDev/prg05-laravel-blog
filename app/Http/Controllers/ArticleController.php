<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $article = new Article();
//        $article->title = 'Random Article';
//        $article->category = 1050;

//        return view('articles.index');
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // GET
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // POST
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'category' => 'required',
        ], [
            'title.required' => 'Add a title!',
        ]);

        $article = new Article();

        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->image = $request->input('image');
        $article->category = $request->input('category');
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
    public function edit(string $id)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'category' => 'required',
        ], [
            'title.required' => 'Add a title!',
        ]);

        $article = $article->$id;

        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->image = $request->input('image');
        $article->category = $request->input('category');
        $article->user_id = auth()->user()->id;

        $article->save();

        return redirect()->route('articles.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
}
