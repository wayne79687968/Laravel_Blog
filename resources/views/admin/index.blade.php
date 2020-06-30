<x-admin-master>

@section('content')

    @if (auth()->user()->isRole('Admin'))

    <h1 class="h3 mb-4 text-gray-800">Dash Board</h1>

    @endif



@endsection





</x-admin-master>
