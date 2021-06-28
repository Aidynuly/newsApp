@extends('templates/header')

@section('main_content')
    <table class="table table-bordered" width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Detail</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{$d->id}}</td>
                <td>{{$d->title}}</td>
                <td>{{$d->detail}}</td>
                <td><img src="{{asset('imgs').'/'.$d->image}}" width="75"/></td>
                <td>
                    <a href="{{url('admin/category/'.$d->id.'/edit')}}" class="text-info">Update</a>
                    <a onclick="return confirm('Are u sure?')" href="{{url('admin/category/'.$d->id.'/delete')}}" class="text-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>

    <div class="d-flex flex-column flex-md-row">
        <a href="{{url('admin/category/create')}}" class="w-100 btn btn-lg btn-dark">Add Category</a>
    </div>

@endsection
