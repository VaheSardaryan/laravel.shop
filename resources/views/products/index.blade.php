@extends('layouts.app')
@section('content')
    <div class="container">

        <a class="btn btn-success my-5" href="{{ route('products.create') }}">
            Create new product
        </a>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Description</td>
                <td>Price</td>
                <td>Created At</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $key => $product)
                <tr>
                    <td>{{ $key + 1  }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('products.show', ['id' => $product->id]) }}">
                            Show
                        </a>
                        <a class="btn btn-light" href="{{ route('products.edit', ['id' => $product->id]) }}">
                            Edit
                        </a>
                        <button class="btn btn-danger">
                            Remove
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
