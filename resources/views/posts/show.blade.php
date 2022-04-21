@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-75">
        </div>

        <div class="col-4">

            <div class="d-flex align-items-center pb-5 border-bottom">
            <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-25" >
            <h3 class="pl-3 font-weight-bold">
                <a href="/profile/{{$post->user->id}}">{{$post->user->username}}</a>
            </h3>
            </div>

            <h5 class="pt-5">{{$post->caption}}</h5>
        </div>
    </div>

</div>
@endsection
