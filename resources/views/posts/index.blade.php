@extends('layouts.app')

@section('content')

    @foreach($posts as $post)
        <div class="container justify-content-center col-5 ">
            <div class="row">
                <div class="pb-3 ">
                    <div class="card">
                        <div class="d-flex align-items-center py-2 ps-2">
                            <a href="{{ route('profile.show', $post->user->profile) }}" class="d-flex align-items-center link-dark text-decoration-none fw-bold">
                                <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle" width="40" height="40"  alt="">
                                <div class="mx-2">
                                    {{ $post->user->username }}
                                </div>
                            </a>
                            <a href="" class="text-decoration-none">Follow</a>
                        </div>

                        <img src="{{'/storage/' . $post->image}}" class="w-100" alt="">

                        <div class="card-body">
                            <div class="d-flex">
                                <a href="{{ route('profile.show', $post->user->profile) }}" class=" fw-bolder link-dark text-decoration-none pe-1">
                                    {{ $post->user->username }}
                                </a>

                                {{ $post->caption }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>

@endsection


