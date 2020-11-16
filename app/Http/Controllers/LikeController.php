<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Like;
use Carbon\Carbon;

class LikeController extends Controller
{


    public function like()
    {
        $like = Like::create(['user_id' => auth()->user()->id, 'article_id' => request("article_id")]);
        return redirect(route("home"));
        // $body = file_get_contents('php://input');
        // $bodyDecoded = json_decode($body, true);
   
        // $article_id = $bodyDecoded['article_id'];
        // $like = Like::create(['user_id' => auth()->user()->id, 'article_id' => $article_id]);
        
    }
    public function dislike()
    {
        $like = Like::where(['user_id' => auth()->user()->id, 'article_id' => request("article_id")]);

        if ($like) {

            $like->delete();
        }
        return redirect(route("home"));
    }
}
