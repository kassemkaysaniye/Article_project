<link href="{{ asset('css/app.css') }}">

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-dark text-dark bg-light">
                    <div class="card-header bg-secondary  border-dark">
                        <h2 style=" text-align: center;">Add Article</h2>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('store.article') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="article"
                                    class="col-md-4 col-form-label text-md-right font-size:40px">Title :</label>
                                <input class="input" type="text" name="title" id="title" 
                                    oninvalid="this.setCustomValidity('{{ auth()->user()->name }} you have to enter a title')"
                                    oninput="this.setCustomValidity('')" required>


                            </div>

                            <div class="form-group row">
                                <label for="body" class="col-md-4 col-form-label text-md-right">Body :</label>
                                <textarea class="textarea" name="body" id="body"
                                    oninvalid="this.setCustomValidity('{{ auth()->user()->name }} you have to enter a text')"
                                    oninput="this.setCustomValidity('')" required></textarea>


                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-outline-dark" type="submit" style="margin-left:33px
                                    "> Add Article</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
