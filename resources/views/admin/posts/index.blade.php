<x-admin-master>

@section('content')

    @if (Session('post_delete_message'))
        <div class="alert alert-danger">{{Session('post_delete_message')}}</div>
    @elseif(Session('post_create_message'))
        <div class="alert alert-success">{{Session('post_create_message')}}</div>
    @elseif(Session('post_update_message'))
        <div class="alert alert-success">{{Session('post_update_message')}}</div>
    @endif

    {{-- datatable --}}
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h1 class="m-0 font-weight-bold text-primary">All Posts</h1>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Owner</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Owner</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($posts as $key => $post)
                    <tr>
                        <td>{{$posts->firstItem() + $key}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->title}}</td>
                        <td><img width="200px" src="{{$post->post_image}}"></td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                        <td>
                            <form method="get" action="{{ route('post.edit', $post->id) }}" enctype="miltipart/form-data">
                                @csrf
                                <button class="btn btn-success">Edit</button>
                            </form>
                        <td>
                            <form method="post" action="{{ route('post.delete', $post->id) }}" enctype="miltipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            {{$posts->links()}}
          </div>
@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    {{-- <script src="{{ asset('js/demo/datatables-demo.js') }}"></script> --}}
@endsection

</x-admin-master>
