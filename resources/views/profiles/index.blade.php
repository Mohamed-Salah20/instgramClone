@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row mx-5">
        <div class="col-4 p-5 ">
            <img src="{{$user->profile->profileImage()}}" style="max-height: 200px; max-width: 200px;" class="rounded-circle" alt="test">
        </div>

        <div class="col-8 pt-5 ">
            <div class="d-flex justify-content-between">
<div class="d-flex">
    <h1>{{$user->username}}</h1>
    <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
</div>
                @can('update',$user->profile)
                <a href="/p/create">Add New Post</a>
                @endcan
            </div>

            @can('update',$user->profile)

            <a href="/profile/{{$user->id}}/edit">Edit Profile</a>

            @endcan

            <div class="d-flex ">
                <div class="pr-4"><strong>{{$user->posts->count()}} </strong>posts</div>
                <div class="pr-4"><strong>{{$user->profile->followers->count()}} </strong>followrs</div>
                <div class="pr-4"><strong>{{$user->following->count()}} </strong>following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}}</div>
            <div><a href="#">{{$user->profile->url ?? 'N/A'}}</a></div>
        </div>

    </div>

    <div class="row mt-5">

        @foreach ($user->posts as $post )

        <div class="col-4 pb-5">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image}}" class="w-100" alt="">
            </a>
        </div>

        @endforeach


    </div>











    {{-- <div class="row justify-content-center">
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
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
