{{-- Error handling --}}
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert-danger alert">
                {{$error}}
            </div>
        @endforeach
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
{{----}}
