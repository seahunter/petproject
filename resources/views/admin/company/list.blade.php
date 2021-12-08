@extends('admin.company.company')

@section('content')
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Restaurant name</th>
            <th scope="col">Restaurant description</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $companies as $comp )
            <tr>
                <th scope="row">{{ $comp->id }}</th>
                <td>{{ $comp->title }}</td>
                <td>{{ $comp->description  }}</td>
                <td>
                    <form method="POST" action="{{ route( 'company.destroy', $comp ) }}">
                        <a class="btn btn-success" href="{{ route( 'company.show', $comp ) }}"><i
                                class="bi bi-eye"></i></a>
                        @can('companies_update')
                        <a class="btn btn-primary" href="{{ route( 'company.edit', $comp ) }}"><i
                                class="bi bi-pen"></i></a>
                        @endcan
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
