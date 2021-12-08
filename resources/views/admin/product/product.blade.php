@extends('admin.layout')


@section('actions')
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSuppor  tedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route( 'company.product.index', $company )  }}">Dishes</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary"
                               href="{{ route( 'company.product.create', $company ) }}">Create</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
