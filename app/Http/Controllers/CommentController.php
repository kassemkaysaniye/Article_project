<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Comment;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function store()
    {
     $comment=Comment::create(['user_id'=>auth()->user()->id,'article_id'=>request("article_id"),'body'=>request("comment")]);
     return redirect(route("home"));
    }
}
