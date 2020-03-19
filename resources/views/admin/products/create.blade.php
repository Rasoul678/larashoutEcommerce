@extends('admin.app')
@section('title') Create Product @endsection
=@section('content')
    <div>
        <div>
            <h1 class="center">Create Product</h1>
        </div>
    </div>
    <div class="row">
        <form class="col s12" action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <h4>Product Information</h4>
            <hr>

            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="name" name="name" autofocus value="{{ old('name') }}">
                    <label for="name">Name</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12 m6">
                    <input type="text" id="sku" name="sku" autofocus value="{{ old('sku') }}">
                    <label for="sku">SKU</label>
                </div>
                <div class="input-field col s12 m6">
                    <input type="text" id="weight" name="weight" autofocus value="{{ old('weight') }}">
                    <label for="weight">Weight</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input type="text" id="price" name="price" autofocus value="{{ old('price') }}">
                    <label for="price">Price</label>
                </div>
                <div class="input-field col s12 m6">
                    <input type="number" id="quantity" name="quantity" autofocus value="{{ old('quantity') }}">
                    <label for="quantity">Quantity</label>
                </div>
            </div>
            <div class="row">
                <label>Categories</label>
                <div class="input-field col s12">
                    <select name="categories[]" class="browser-default">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="description" class="materialize-textarea">{{ old('description') }}</textarea>
                    <label for="description">Description</label>
                </div>
            </div>

            <p>
                <label>
                    <input type="checkbox" class="filled-in"  id="status" name="status"/>
                    <span>Status</span>
                </label>
            </p>

            <p>
                <label>
                    <input type="checkbox" class="filled-in"  id="featured" name="featured"/>
                    <span>Featured</span>
                </label>
            </p>

            <div class="input-field col s12">
                <button class="waves-effect waves-light btn" type="submit">Save Product</button>
                <a class="waves-effect waves-light btn red" href="{{ route('admin.products.index') }}">Go Back</a>
            </div>

        </form>
    </div>
@endsection
