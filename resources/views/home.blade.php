@extends('templates.headerforclients')

@section('main_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row mb-5">
                                    @if(count($posts)>0)
                                        @foreach($posts as $post)
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><a href="{{url('detail/'.$post->id)}}">{{$post->title}}</a></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="alert alert-danger">No Post Found</p>
                                    @endif
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
