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


        <form action="{{url('admin/category/'.$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="text" name="title" class="form-control" value="{{$data->title}}">
            <input type="text" name="detail" class="form-control" value="{{$data->detail}}">
            <p class="my-2"><img width="80" src="{{asset('imgs')}}/{{$data->image}}"></p>
            <input type="hidden" value="{{$data->image}}" name="image"/>
            <input type="file">
            <div class="d-flex flex-column flex-md-row">
                <button class="w-100 btn btn-lg btn-dark" type="submit">Submit</button>
            </div>
        </form>

    </div>
@endsection
