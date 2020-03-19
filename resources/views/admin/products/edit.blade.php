@extends('admin.app')
@section('title') Edit Product @endsection
=@section('content')

    <div>
        <div>
            <h1 class="center">Edit Product</h1>
        </div>
    </div>
    <div class="row">
        <form class="col s12" action="{{ route('admin.products.update') }}" method="POST">
            @csrf
            <h4>Product Information</h4>
            <hr>

            <div class="row">
                <div class="input-field col s12">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="text" id="name" name="name" autofocus value="{{ old('name', $product->name) }}">
                    <label for="name">Name</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12 m6">
                    <input type="text" id="sku" name="sku" autofocus value="{{ old('sku', $product->sku) }}">
                    <label for="sku">SKU</label>
                </div>
                <div class="input-field col s12 m6">
                    <input type="text" id="weight" name="weight" autofocus value="{{ old('weight', $product->weight) }}">
                    <label for="weight">Weight</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input type="text" id="price" name="price" autofocus value="{{ old('price', $product->price) }}">
                    <label for="price">Price</label>
                </div>
                <div class="input-field col s12 m6">
                    <input type="number" id="quantity" name="quantity" autofocus value="{{ old('quantity', $product->quantity) }}">
                    <label for="quantity">Quantity</label>
                </div>
            </div>
            <div class="row">
                <label>Categories</label>
                <div class="input-field col s12">
                    <select name="categories[]" class="browser-default">
                        @foreach($categories as $category)
                            @php $check = in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : ''@endphp
                            <option value="{{ $category->id }}" {{ $check }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="description" class="materialize-textarea">{{ old('description', $product->description) }}</textarea>
                    <label for="description">Description</label>
                </div>
            </div>

            <p>
                <label>
                    <input type="checkbox" class="filled-in"  id="status" name="status" {{ $product->status == 1 ? 'checked' : '' }}/>
                    <span>Status</span>
                </label>
            </p>

            <p>
                <label>
                    <input type="checkbox" class="filled-in"  id="featured" name="featured" {{ $product->featured == 1 ? 'checked' : '' }}/>
                    <span>Featured</span>
                </label>
            </p>

            <div class="input-field col s12">
                <button class="waves-effect waves-light btn" type="submit">Update Product</button>
                <a class="waves-effect waves-light btn red" href="{{ route('admin.products.index') }}">Go Back</a>
            </div>

        </form>
    </div>
@endsection
