@extends( 'admin.menu.menu' )

@section('content')
    <article>
        <h1>{{ $menu->name }}</h1>
    </article>
    <footer>
        <a href="{{ route('company.menu.edit', [$company, $menu]) }}">Edit</a>
    </footer>
@endsection
