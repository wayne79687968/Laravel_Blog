<x-admin.admin-master>

@section('content')
    <h1>Edit</h1>
    <form method="post" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <div><img height="100px" src="{{ $post->post_image }}" alt=""></div>
            <label for="title">File</label>
            <input type="file" name="post_image" class="form-control-file" id="post_image">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" class="form-control" id="category" value="{{ $post->category }}">
                <option value="Coding">Coding</option>
                <option value="Boardgame">Boardgame</option>
                <option value="Photography">Photography</option>
            </select>
        </div>
        <div class="form-group">
            <textarea name="content" class="form-control" id="content" cols="30" rows="10">{{$post->content}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection


</x-admin.admin-master>
