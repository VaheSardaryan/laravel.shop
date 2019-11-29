@extends('layouts.app')
@section('content')

    <form action="/test/15" method="POST">
        @csrf
        <input type="hidden" name="_method" value="put" />
        <input type="text">
        <button type="submit">Submit</button>
    </form>
@endsection
