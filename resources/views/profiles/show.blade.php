@extends('layouts.app')

@section('content')
    <div class="container justify-content-center d-flex col-9">
        <div class="row">
            <div class="col-3 p-5">
                <img src="{{ $profile->profileImage() }}" class="rounded-circle" width="160" height="160"  alt="">
            </div>

            <div class="col-9 align-self-start p-5">
                <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center mb-2">
                    <div class="me-3">
                        <h3>{{ $profile->user->username }}</h3>
                    </div>
                    @if( auth()->user() && auth()->user()->profile->id === $profile->id)

                    @else
                        <follow-button user-id="{{ $profile->user->id }}" follows="{{ $follows }}"></follow-button>
                    @endif

                </div>

                    @can('update', $profile)
                            <a href="{{ route('post.create') }}">Add New Post</a>
                    @endcan
                </div>

                @can('update', $profile)
                    <a href="{{ route('profile.edit', $profile->id) }}">Edit Profile</a>
                @endcan

                <div class="col d-flex mt-3">
                    <div class=""><strong>{{ $postCount }}</strong> posts</div>
                    <div class="px-5"><strong>
                            <a href="{{ route('showFollowers', $profile->id) }}" class="link-dark text-decoration-none">
                                {{ $followerCount }} followers
                            </a>
                        </strong>
                    </div>
                    <div class=""><strong>

                            <a href="{{ route('showFollowing', $profile->id) }}" class="link-dark text-decoration-none">
                                {{ $followingCount }} following
                            </a>
                        </strong> </div>
                </div>
                <div class="col">
                    <div class="mt-3 fw-bold">{{ $profile->title }}</div>
                    <div class="text-black-50">{{ $profile->category }}</div>
                    <div>{{ $profile->description }}</div>
                </div>
                <div>
                    <a href="#">{{ $profile->url }}</a>
                </div>
            </div>


            <div class="row">
                @foreach($profile->user->posts as $post)
                    <div class="col-4 mb-4">
                        <a href="{{ route('post.show', $post) }}">
                            <img src="{{'/storage/' . $post->image }}" class="w-100" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
@endsection
