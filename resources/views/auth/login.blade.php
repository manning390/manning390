@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('/login') }}" class="form-horizontal" role="form" method="POST">
                            {{ csrf_field() }}

                            @include('partial._textfield', ['name'=>'email', 'type'=>'email', 'attr'=>'required autofocus'])

                            @include('partial._textfield', ['name'=>'password', 'type'=>'password', 'attr'=>'required'])

                            <div class="form-group">
                                {{-- <div class="col-md-8 col-md-offset-4"> --}}
                                    <button class="btn btn-default" type="submit">Login</button>
                                {{-- </div> --}}
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection