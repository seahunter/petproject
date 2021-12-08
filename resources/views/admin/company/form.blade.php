@extends('admin.company.company')

@section('content')
    @if( isset( $company ) )
        <h1>Update {{ $company->title }}</h1>
    @else
        <h1>Create new company</h1>
    @endif

    <form method="POST"
          @if( isset( $company ) )
          action="{{ route( 'company.update', $company ) }}"
          @else
          action="{{ route( 'company.store' ) }}"
        @endif
    >
        @if(isset($company))
            @method('PUT')
        @endif
        @csrf
        <div class="form-group">
            <label for="company_name">Name</label>
            <input type="text" name="title" class="form-control" id="company_name"
                   placeholder="Enter company name" value="{{ isset( $company->title ) ? $company->title : '' }}">
        </div>
        <div class="form-group">
            <label for="company_description">Description</label>
            <textarea class="form-control" name="description" id="company_description" cols="30"
                      rows="3">{{ isset( $company->description ) ? $company->description : '' }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
