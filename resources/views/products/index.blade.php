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
                    <td class="d-flex">
                        <a class="btn btn-info" href="{{ route('products.show', ['id' => $product->id]) }}">
                            Show
                        </a>
                        <a class="btn btn-light" href="{{ route('products.edit', ['id' => $product->id]) }}">
                            Edit
                        </a>
                        <form onsubmit="checkDelete(event)" data-name="{{ $product->name }}" action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button class="btn btn-danger">
                                remove
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

<script type="text/javascript">
    function checkDelete(ev) {
        ev.preventDefault();
        var form = ev.target;
        var prodName = form.getAttribute('data-name');

        if(confirm('Are you sure to delete ' + prodName + '?')){
            ev.target.submit();
        }
    }
</script>
