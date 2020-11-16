@extends('layouts.app')
@section('header')
<button class="btn btn-outline-dark"><a href="{{ route('add.article') }}" style="color:black;"> Add New Article </a></button>
    
@endsection

@section('content')

    <div class="container">
        
        <div class="row justify-content-center">
            
            <div class="col-md-20">
                
                <div class="row row-cols-1 row-cols-md-2">
            
                @foreach (App\Models\Article::all()->reverse()->values() as $article)
    
                <div class="col-md-8">
                <div class="card border-dark text-dark bg-light ">
                
                
                    <div class="card-header bg-secondary  border-dark">
                        
                       <h2 style="text-align: center;"> {{ $article->user->name }} </h2> 
                       @if (auth()->user()->id == $article->user_id)
                                <form method="POST" >
                                    @csrf
                                    <input type="hidden" name="article_id" value={{ $article->id }}>
                                    <button type="submit" class="btn btn-outline-dark" aria-label="Right Align" formaction="{{ route('delete.article') }}" name="add" style="float: right;">Delete</button>
                                    <input type="hidden" name="article_id" value={{ $article->id }}>


                                    <button type="submit" class="btn btn-outline-dark" style="margin-left:575px"  formaction="{{ route('edit.article') }}" name="add" style="float: right;">Edit  </button>

                                </form>
                                
                                
                            @endif
                            
                            
                    </div>

                    <div class="card-body ">
                        

                            <h2 style="color: cornflowerblue"> {{ $article->title }} </h2>

                            <p> {{ $article->body }}</p>
                            <br>
                            @if ($article->comment()->count() > 0)
                                <h4> Comments </h4>
                                @else 
                                <h5> No comments yet </h5>
                                @endif

                            
                            @foreach ($article->comment as $comment)
                            
                                <div>
                                <p> {{ $comment->user['name'] }} : {{ $comment->body }}</p>
                                </div>

                            @endforeach



                            <div class="card-footer bg-transparent  border-succes" style="display: flex;">
                            <form method="POST" style=" display: inline-block;" >
                                @csrf
                                 <form method="POST">
                                    @csrf
                                <input type="hidden" name="article_id" value={{ $article->id }}>
                                @if (auth()->user()->liked($article->id))
                                    <button  type="submit" formaction="{{ route('dislike.article') }}" class="btn btn-outline-dark" style="width:90px">Dislike  <span class="badge badge-light">{{ $article->like->count() }}</span></button>
                                    @else
                                    <button type="submit" formaction="{{ route('like.article') }}" class="btn btn-outline-primary"style="width:90px">Like  <span class="badge badge-light">{{ $article->like->count() }}</span></button>

                                @endif
                            </form>
                               
                            <form method="POST">
                                @csrf
                            <input type="text" class="col-md-4 col-form-label text-md-right" placeholder=" Write you comment" name="comment" style="margin-left:5px;width:550px" oninvalid="this.setCustomValidity('{{auth()->user()->name}} you have to enter a comment')"
                                oninput="this.setCustomValidity('')" required>
                                <input type="hidden" name="article_id" value={{ $article->id }}>
                                <button type="submit" formaction="{{ route('comment.home') }}" class="btn btn-outline-dark" name="add">Add Comment  <span class="badge badge-light">{{ $article->comment->count() }}</span></button>
                            </form>

                            </form>
                            <br>
                       
                        </div>
                        

                    </div>
                    
                </div>
                <br>
                <br>
                <br>
                <br>
            </div>
                @endforeach
            
        
            </div>
    </div>
    </div>

@endsection
