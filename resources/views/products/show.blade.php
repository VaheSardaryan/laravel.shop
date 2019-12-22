@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Show</h1>
        <div class="w-50 m-auto">
            <p>
                Name = {{$product->name}}
            </p>
            <p>
                Description = {{$product->description}}
            </p>
            <p>
                Price = {{$product->price}}
            </p>
{{--            <img src="{{tumbnail}}" style="height: 100%;width: 100%;object-fit: cover;">--}}
            <p>
                Owner = {{Auth::user()->name}}
            </p>
            
        </div>
        <div>
            @if(count($product->comments))
                @foreach($product->comments as $comment)
                    <div>
                        <p>{{ $comment->author->name }}</p>
                        <p>{{ $comment->content }}</p>
                        <p>{{ $comment->created_at }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
