@extends('templates/header')

@section('main_content')

    @if(!\Illuminate\Support\Facades\Session::has('adminData'))
        <script type="text/javascript">
            window.location.href = "{{url('admin/login')}}"
        </script>
    @endif


    <div class="container">
        <h1>Dashboard</h1>
        <a class="btn btn-dark" href="{{url('/admin/category')}}">Category</a>
        <a class="btn btn-dark" href="{{url('/admin/post')}}">Posts</a>
        <a class="btn btn-danger" href="{{url('/admin/logout')}}">Logout</a>
    </div>
@endsection
