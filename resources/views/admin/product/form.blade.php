@extends('admin.product.product')

@section('content')
    @if(isset($product))
    <h1>Update product {{ $product->name }}</h1>
    @else
    <h1>Create new product</h1>
    @endif
    <form method="POST"
          @if(isset($product))
          action="{{ route('company.product.update', [$company, $product]) }}"
          @else
          action="{{ route('company.product.store', $company) }}"
        @endif
    >
        @if(isset($product))
            @method('PUT')
        @endif
        @csrf
        <div class="form-group">
            <label for="dish_name">Dish name</label>
            <input type="text" name="name" class="form-control" id="dish_name"
                   placeholder="Enter dish name" value="{{ isset($product) ? $product->name : '' }}">
        </div>
        <div class="form-group">
            <label for="dish_weight">Dish weight</label>
            <input type="number" name="weight" class="form-control" id="dish_weight"
                   placeholder="Enter dish weight (g)" value="{{ isset($product) ? $product->weight : '' }}">
        </div>
        <div class="form-group">
            <label for="dish_price">Dish price</label>
            <input type="number" name="price" class="form-control" id="dish_price"
                   placeholder="Enter dish price" value="{{ isset($product) ? $product->price : '' }}">
        </div>
        <div class="form-group">
            <label for="dish_price">Select menu for the dish</label>
            <select name="menu_id" id="" class="custom-select">
                @foreach( $menus as $menu )
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-check">
            <input type="checkbox" name="active" class="form-check-input" id="dish_active_status"
                   placeholder="Enter status"
                   value="1" {{ isset($product->active) && $product->active === 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="dish_active_status">Is active dish</label>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
@endsection
