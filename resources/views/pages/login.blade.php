@extends('templates/header')

@section('main_content')
    <div class="container">
        <h1>Please write your login and password</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(\Illuminate\Support\Facades\Session::has('error'))
            <p class="text-danger">{{session('error')}}</p>
        @endif


        <form method="post">
            @csrf
            <input type="text" name="username" id="email" class="form-control" placeholder="name@example.com">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">

            <div class="d-flex flex-column flex-md-row">
                <button class="w-100 btn btn-lg btn-dark" type="submit">Sign in</button>
            </div>
        </form>


        {{--    @foreach($model as $m)--}}
        {{--        <div class="alert alert-warning">--}}
        {{--            <h4>{{ $m->email }}</h4>--}}
        {{--        </div>--}}
        {{--    @endforeach--}}

    </div>
@endsection
