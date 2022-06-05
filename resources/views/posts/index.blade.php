@extends('layouts.app')

@section('content')

<head>
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
</head>
 {{-- --}}
    {{-- <article class="leaderboard">

        <main class="leaderboard__profiles">
        <article class="leaderboard__profile">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Mark Zuckerberg" class="leaderboard__picture">
            <span class="leaderboard__name">Mark Zuckerberg</span>
            <span class="leaderboard__value">35.7<span>B</span></span>
        </article>

        <article class="leaderboard__profile">
            <img src="https://randomuser.me/api/portraits/men/97.jpg" alt="Dustin Moskovitz" class="leaderboard__picture">
            <span class="leaderboard__name">Dustin Moskovitz</span>
            <span class="leaderboard__value">9.9<span>B</span></span>
        </article>

        <article class="leaderboard__profile">
            <img src="https://randomuser.me/api/portraits/women/17.jpg" alt="Elizabeth Holmes" class="leaderboard__picture">
            <span class="leaderboard__name">Elizabeth Holmes</span>
            <span class="leaderboard__value">4.5<span>B</span></span>
        </article>

        <article class="leaderboard__profile">
            <img src="https://randomuser.me/api/portraits/men/37.jpg" alt="Evan Spiegel" class="leaderboard__picture">
            <span class="leaderboard__name">Evan Spiegel</span>
            <span class="leaderboard__value">2.1<span>B</span></span>
        </article>
        </main>
    </div> --}}
{{--  --}}
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
