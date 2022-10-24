@extends('layouts.app')

@section('content')
    <div class="container justify-content-center d-flex col-9">
        <div class="row">

            <div class="col-9 align-self-start p-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="">
                        <div class="card">
                            <div class="card-header">Followers</div>
                                <div class="card-body">
                                    @foreach($followers as $follower)
                                            <a href="{{ route('profile.show', $follower->profile->id ) }}"
                                        class="text-decoration-none link-dark">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="pe-2">
                                                        <img  src="{{ $follower->profile->profileImage() }}" class="rounded-circle" width="40" height="40"  alt="">
                                                    </div>
                                                    <p class="card-text">{{ $follower->username }}</p>
                                                </div>
                                            </a>
                                    @endforeach
                                </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
@endsection
