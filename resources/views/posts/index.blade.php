@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($posts as $post )

    <div class="row mb-5 border-bottom border-dark">

        <div class="col-4 offset-3 mb-2">

            <div class="d-flex align-items-center pb-3 border-bottom">
                <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-25" >
                <h3 class="pl-3 font-weight-bold">
                    <a href="/profile/{{$post->user->id}}">{{$post->user->username}}</a>
                </h3>
            </div>

            <h5 class="pt-5">{{$post->caption}}</h5>
        </div>
        <div class="col-8 offset-3 mb-5">
            <a href="/p/{{$post->id}}"><img src="/storage/{{ $post->image }}" class="w-75"></a>
        </div>
    </div>

    @endforeach

    <div class="d-flex justify-content-center">
        {{$posts->links()}}
    </div>
</div>
@endsection
