<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Article;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!auth()->user()->is_admin){
            return redirect('/');
        }

        $articles = Article::all();

        return view('admin.index', compact('articles'));
    }

    public function toggle( Article $article)
    {
        $article->published = !$article->published;
        $article->save();

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.index');
    }
}
