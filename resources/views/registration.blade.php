@extends('templates.headerforclients')

@section('main_content')

    <h3>Please, fill for register</h3>


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

    <form method="post" action="">
        @csrf
        <input type="text" name="name" id="name" class="form-control" placeholder="Name Surname">
        <input type="text" name="email" id="email" class="form-control" placeholder="name@example.com">
        <input type="password" name="password" id="password" class="form-control" placeholder="password">
        <input type="file" name="image">
        <div class="d-flex flex-column flex-md-row">
            <button class="w-100 btn btn-lg btn-dark" type="submit">Register</button>
        </div>
    </form>

@endsection
