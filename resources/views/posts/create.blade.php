@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="post">
            @csrf

            <div class="card mt-2 col-6 mx-auto">
                <div class="card-group">
                    <div class="card">
                        <div class="card-header"> Create post</div>
                        <div class="card-body">
                            <div class="form-group row ">
                                <label for="caption" class="col-md-4 col-form-label">Post Caption</label>

                                <div class="col-md-6">
                                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}"  autocomplete="username">

                                    @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="image" class="col-md-4 col-form-label">Post Image</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" id="image" name="image">

                                    @error('image')
                                       <strong>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row offset-4">
                                <div class="col-md-6 mt-3">
                                    <button class="btn btn-primary">Add New Post</button>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>

        </form>

    </div>
@endsection
