@extends('layouts.app')

@section('content')
<style>


    body{margin-top:20px;}

.comment-wrapper .panel-body {
    max-height:650px;
    overflow:auto;
}

.comment-wrapper .media-list .media img {
    width:60px;
    height:60px;
    border:2px solid #000000;
    border-radius: 50%;
}

.comment-wrapper .media-list .media {
    border-bottom:1px dashed #efefef;
    margin-bottom:25px;
}

</style>
<div class="container">

    <div class="row">
        <div class="col-7">
            <img src="/storage/{{ $post->image }}" class="w-75">
        </div>

        <div class="col-5">

            <div class="d-flex align-items-center pb-3">
            <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-25" >
            <h3 class="pl-3 font-weight-bold">
                <a href="/profile/{{$post->user->id}}">{{$post->user->username}}</a>
            </h3>
            </div>

            <h5 class="mb-4 ml-5 pl-5">{{$post->caption}}</h5>
            {{--  --}}
            <div class="border-bottom mb-4"></div>

            <div class="container">
                <div class="row bootstrap snippets bootdeys">
                    <div class="col-md-8 col-sm-12">
                        <div class="comment-wrapper">
                            <div class="panel panel-info">

                                <div class="panel-body">
                                    <form action="/p/{{ $post->id }}/comment" method="post">
                                        @csrf
                                        <textarea name="textAreaComment" maxlength="100" class="form-control" placeholder="max lenght 100 char" rows="3"></textarea>
                                        <br>
                                        <input type="submit" value="Comment" class="btn btn-info pull-right">
                                    </form>
                                    {{-- <div class="clearfix"></div> --}}
                                    <hr>
                                    <ul class="media-list">

                                        @foreach ( $comments as $comment )
                                        <li class="media">
                                            <a href="#" class="pull-left ml-0 pl-0">
                                                <img src="{{$comment->user->profile->profileImage()}}" alt="" class="rounded" width="60px" height="60px">
                                            </a>
                                            <div class="media-body ml-3 mr-5">
                                                <span class="text-muted pull-left">
                                                    <small class="text-muted">{{ $comment->created_at }}</small>
                                                </span>
                                                <br>
                                                <strong class="text-success"><a href="/profile/{{$comment->user->id}}">{{$comment->user->username}}</a></strong>
                                                <p style="width: 150px; overflow: hidden; word-wrap: break-word;">
                                                    {{ $comment->comment }}
                                                </p>
                                            </div>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                </div>

                {{--  --}}
            </div>
        </div>

</div>
@endsection
