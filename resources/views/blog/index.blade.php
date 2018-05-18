@extends('layout.app')

@section('content')
    Is it working?
    @foreach($blogs as $blog)
        <!--{{ $blog->title }}<br />-->
    @endforeach
@endsection
