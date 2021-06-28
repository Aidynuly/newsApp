@extends('templates.headerforclients')
@section('main_content')
    <div class="row">
        <div class="col-md-8">
            @if(Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="card">
                <h5 class="card-header">
                    {{$detail->title}}
                    <span class="float-end">Author - {{$author}}</span>
                </h5>
                <div class="card-body">
                    {{$detail->text}}
                </div>
            </div>
        @auth
        <div class="card my-5">
            <h5 class="card-header">Add Comment</h5>
            <div class="card-body">
                <form method="post" action="{{url('saveComment/'.Str::slug($detail->title).'/'.$detail->id)}}">
                    @csrf
                    <textarea name="comment" class="form-control"></textarea>
                    <input type="submit" class="btn btn-dark mt-2" />
                </form>
            </div>
        </div>
        @endauth
        <div class="card my-4">
            <h5 class="card-header">Comments</h5>
            <div class="card-body">
                    @foreach($comments as $comment)
                        <blockquote class="blockquote">
                            <p class="mb-0">{{$comment->comment}}</p>
                            @if($comment->user_id==0)
                                <footer class="blockquote-footer">Admin</footer>
                            @else
                                <footer class="blockquote-footer">{{$comment->user->name}}</footer>
                            @endif
                        </blockquote>
                        <hr/>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
