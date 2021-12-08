@extends('admin.menu.menu')

@section('content')
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Menu title</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $menus as $menu )
            <tr>
                <th scope="row">{{ $menu->id }}</th>
                <td>{{ $menu->name }}</td>
                <td>
                    <form method="POST" action="{{ route('company.menu.destroy', [$company, $menu]) }}">
                        <a class="btn btn-primary" href="{{ route( 'company.menu.edit', [$company, $menu] ) }}"><i
                                class="bi bi-pen"></i></a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="bi bi-x"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
