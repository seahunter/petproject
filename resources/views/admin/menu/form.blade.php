@extends('admin.menu.menu')

@section('content')
    <h1>Create new menu</h1>
    <form method="POST"
          @if(isset($menu))
          action="{{ route('company.menu.update', [$company, $menu]) }}"
          @else
          action="{{ route('company.menu.store', $company) }}"
        @endif
    >
        @if(isset($menu))
            @method('PUT')
        @endif
        @csrf
        <div class="form-group">
            <label for="menu_name">Menu name</label>
            <input type="text" name="name" class="form-control" id="menu_name"
                   placeholder="Enter menu name" value="{{ isset($menu) ? $menu->name : '' }}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
@endsection
