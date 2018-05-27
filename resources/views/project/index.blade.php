@extends('layout.sidebar')

@section('sidebar')

@endsection

@section('content')
{{--     <article class="container">
        <section id="construction">
            <p class="extra-large">Coming soon..</p>
        </section>
    </article>
 --}}    @foreach($projects as $project)
        <!--{{ $project->title }}<br />-->
    @endforeach
@endsection