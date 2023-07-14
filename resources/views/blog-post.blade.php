<x-home-master>

@section('content')
        <!-- Title -->
        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
          by
            <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{$post->updated_at}}</p>

        <hr>

        @if ($post->post_image)
        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{$post->post_image}}" alt="image missing...">

        <hr>
        @endif
        
        <!-- Post Content -->
        <p class="lead">{{$post->content}}</p>

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form method="post" action="{{ route('comment.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <input type="hidden" name="posts_id" id="posts_id" value="{{$post->id}}">
                <textarea name="content" id="content" class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        @foreach ($comments as $comment)
        <!-- Comment with nested comments -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="{{$comment->user->avatar}}" style="width: 5em; height: 5em;" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{$comment->user->name}}</h5>
            {{$comment->content}}
          </div>
        </div>
        @endforeach


@endsection

</x-home-master>
