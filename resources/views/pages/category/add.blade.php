@extends('templates/header')

@section('main_content')
    <div class="container">
        <h1>Category</h1>
        <a href="{{url('admin/category/')}}" class="btn btn-dark">All Category</a>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(\Illuminate\Support\Facades\Session::has('success'))
            <p class="text-info">{{session('success')}}</p>
        @endif


        <form action="{{url('admin/category')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" class="form-control" placeholder="title">
            <input type="text" name="detail" class="form-control" placeholder="detail">
            <input type="file" name="image">
            <div class="d-flex flex-column flex-md-row">
                <button class="w-100 btn btn-lg btn-dark" type="submit">Submit</button>
            </div>
        </form>

    </div>
@endsection
