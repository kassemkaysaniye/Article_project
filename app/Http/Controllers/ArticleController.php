<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Article;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ArticleController extends Controller
{
    public function show()
    {
        return view('articles.add');
    }
    public function store()
    {
        // return view(articles.add);
     $article=Article::create(['user_id'=>auth()->user()->id,'title'=>request("title"),'body'=>request("body")]);
     return redirect(route("home"));
    }

    public function index()
    {
     return view('home');
    }

    public function delete()
    {
     $article=Article::where('id',request("article_id"))->delete();
     return redirect(route("home"));
    }

    public function edit()
    {
     $article=Article::find(request("article_id"));
    return view('articles.edit',['article'=>$article]);
    }

    public function update()
    {
    $article=Article::where('id', request("article_id"))->update(['title' =>request("title"),'body' => request("body")]);
    return redirect(route("home"));
    }
}
