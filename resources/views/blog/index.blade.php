@extends('layout.app')

@section('content')
    @foreach($blogs as $blog)
        <!--{{ $blog->title }}<br />-->
    @endforeach
@endsection
