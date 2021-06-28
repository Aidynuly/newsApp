@extends('templates/header')

@section('main_content')
    <table class="table table-bordered" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>User id</th>
            <th>Title</th>
            <th>Announcement</th>
            <th>Text</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{$d->id}}</td>
                <td>{{$d->user_id}}</td>
                <td>{{$d->title}}</td>
                <td>{{$d->announcement}}</td>
                <td>{{$d->text}}</td>
                <td>
                    <a onclick="return confirm('Are u sure?')" href="{{url('admin/post/'.$d->id.'/delete')}}" class="text-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex flex-column flex-md-row">
        <a href="{{url('admin/post/create')}}" class="w-100 btn btn-lg btn-dark">Add post</a>
    </div>

@endsection
