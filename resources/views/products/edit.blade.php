@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit</h1>
        <div class="w-50 mx-auto">
            <form action="{{ route('products.update', [$product->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label class="d-block">
                        Name
                        <input name="name" type="text"
                               class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required
                               placeholder="Please enter product name"
                               value="{{ old('name') ? old('name') : $product->name }}">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </label>
                </div>
                <div class="form-group">
                    <label class="d-block">
                        Description
                        <input name="description" type="text" class="form-control" placeholder="Please enter product description"
                         value="{{ old('description')? old('description') : $product->description }} ">
                    </label>
                </div>
                <div class="form-group">
                    <label class="d-block">
                        Price
                        <input name="price" type="number" step="0.01" class="form-control" required placeholder="Please enter product price"
                               value="{{ old('price') ? old('price') : $product->price}}">
                    </label>
                </div>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection
