@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Main page</h1>
{{--        <img src="{{$products[0]->thumbnail}}">--}}
        <div class="row">
            @foreach($products as $product)
                <div class="col-4">
                    <div style="width: 200px; height: 150px;">
                        <img style="height: 100%; width: 100%; object-fit: cover;" src="{{$product->thumbnail}}">                   </div>
                    <div>
                        <h4> {{$product->name}}</h4>
                    </div>
                    <p>{{$product->owner->name}}</p>
                </div>
                @endforeach
        </div>

    </div>
    @endsection
