@extends('layouts.app')

@section('content')
    <div class="container justify-content-center d-flex col-8">
        <div class="row">
            <div class="col-7">
                <img src="{{'/storage/' . $post->image}}" class="w-100" alt="">
            </div>
            <div class="col-5">
                    <div class="d-flex align-items-center  fw-bold pe-3">
                        <a href="{{ route('profile.show', $post->user->profile) }}" class="d-flex align-items-center link-dark text-decoration-none">
                            <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle" width="40" height="40"  alt="">
                            <div class="mx-2">
                                {{ $post->user->username }}
                            </div>
                        </a>
                        <div class="">
                            <a href="" class="text-decoration-none">Follow</a>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <p>
                            <div class="fw-bolder pe-2">
                                <a href="{{ route('profile.show', $post->user->profile) }}" class="link-dark text-decoration-none">
                                    {{ $post->user->username }}
                                </a>
                            </div>

                            {{ $post->caption }}
                        </p>
                    </div>
            </div>
        </div>
    </div>
@endsection
