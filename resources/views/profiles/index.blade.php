@extends('layouts.app')

@section('content')
<div class="container justify-content-center d-flex col-9">
        <div class="row">
            <div class="col-3 p-5">
                <img src="{{ $user->profile->profileImage() }}" class="rounded-circle" width="160" height="160"  alt="">
            </div>

            <div class="col-9 align-self-start p-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h3>{{ $user->username }}</h3>
                    <a href="{{ route('post.create') }}">Add New Post</a>
                </div>

                    <a href="{{ route('profile.edit', $user->profile->id) }}">Edit Profile</a>

                <div class="col d-flex mt-3">
                    <div class=""><strong>{{ $user->posts()->count() }}</strong> posts</div>
                    <div class="px-5"><strong>25.8K</strong> followers</div>
                    <div class=""><strong>628</strong> following</div>
                </div>
                <div class="col">
                <div class="mt-3 fw-bold">{{ $user->profile->title }}</div>
                <div class="text-black-50">{{ $user->profile->category }}</div>
                <div>{{ $user->profile->description }}</div>
                </div>
                <div>
                    <a href="#">{{ $user->profile->url }}</a>
                </div>
            </div>


        <div class="row">
            @foreach($user->posts as $post)
                <div class="col-4 mb-4">
                    <a href="{{ route('post.show', $post) }}">
                        <img src="{{'/storage/' . $post->image }}" class="w-100" alt="">
                    </a>
                </div>
            @endforeach
        </div>
</div>
@endsection
