@extends( 'admin.company.company' )

@section('content')
    <article>
        <h1>{{ $company->title }}</h1>
        <p>{{  $company->description }}</p>
    </article>
    <footer>
        <a href="{{ route('company.edit', $company) }}">Edit</a>
    </footer>
@endsection
