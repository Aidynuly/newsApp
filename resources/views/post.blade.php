@extends('templates.headerforclients')

@section('main_content')

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

    <main class="container m-4">
        Upload post
        <div class="row">
            <div class="col-md-4">
                <div class="card-body bg bg-info">

                    <form action="{{url('/storePost')}}" method="post">
                        @csrf
                        <select class="form-control" name="category">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="title" class="form-control" placeholder="title">
                        <input type="text" name="announcement" class="form-control" placeholder="announcement">
                        <textarea class="form-control" name="text"> </textarea>
                        <div class="d-flex flex-column flex-md-row">
                            <button class="w-100 btn btn-lg btn-dark" type="submit">Submit</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </main>
@endsection
