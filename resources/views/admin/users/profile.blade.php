<x-admin-master>

@section('content')
    @if (Session('user_update_message'))
        <div class="alert alert-success">{{Session('user_update_message')}}</div>
    @endif
    <h1>User Profile</h1>
    <form method="post" action="{{ route('user.profile.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <img class="img-profile rounded-circle mb-4 w-25 p3" src="{{ asset($user->avatar) }}">
        <div class="form-group">
            <input type="file" name="avatar" class="form-control-file" id="avatar">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{$user->username}}">

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$user->name}}">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

</x-admin-master>
