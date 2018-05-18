@extends('layout.app')

@section('content')
    <div class="container mt-20 mt-sm-40 mb-120">
        <div class="row">
            <aside class="sidebar col-12 col-md-3">
                @yield('sidebar')
            </aside>
            <div class="col-12 col-sm-9">
                @yield('content')
            </div>
        </div>
    </div>
@overwrite