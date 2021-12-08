@extends( 'admin.company.company' )

@section('content')
    <article>
        <h1>{{ $product->name }}</h1>
        <p>{{  $product->weight . ' (g)' }}</p>
        <p>{{  $product->price . '$' }}</p>
    </article>
    <footer>
        <a href="{{ route('company.product.edit', [$company, $product]) }}">Edit</a>
    </footer>
@endsection
