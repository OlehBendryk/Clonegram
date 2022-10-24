@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('profile.update', $profile) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')

            <div class="card mt-2 col-6 mx-auto">
                <div class="card-group">
                    <div class="card">
                        <div class="card-header"> Edit Profile</div>
                        <div class="card-body">
                            <div class="form-group row ">
                                <label for="title" class="col-md-4 col-form-label">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $profile->title }}"  placeholder="" autocomplete="title">

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="category" class="col-md-4 col-form-label">Category</label>

                                <div class="col-md-6">
                                    <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ $profile->category }}" >

                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="description" class="col-md-4 col-form-label">Description</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $profile->description }}"  >

                                    @yield('error')

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="url" class="col-md-4 col-form-label">Url</label>

                                <div class="col-md-6">
                                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ $profile->url }}"  >

                                    @yield('error')

                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" id="image" name="image">

                                    @error('image')
                                    <strong>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row offset-4">
                                <div class="col-md-6 mt-3">
                                    <button class="btn btn-primary">Save Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>
@endsection
