@extends('admin.product.product')

@section('content')
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Dish name</th>
            <th scope="col">Weight</th>
            <th scope="col">Price</th>
            <th scope="col">Menu name</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach( $products as $product )
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->weight  }}</td>
                <td>{{ $product->price  }}</td>
                <td>{{ $product->menu->name  }}</td>
                <td>{{ $product->active ? 'yes' : 'no' }}</td>
                <td>
                    <form method="POST" action="{{ route('company.product.destroy', [$company, $product]) }}">
                        <a class="btn btn-success" href="{{ route( 'company.product.show', [$company, $product] ) }}"><i
                                class="bi bi-eye"></i></a>
                        <a class="btn btn-primary" href="{{ route( 'company.product.edit', [$company, $product] ) }}"><i
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
