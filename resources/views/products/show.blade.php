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
            <p>
                Owner = {{Auth::user()->name}}
            </p>
        </div>
    </div>
@endsection
