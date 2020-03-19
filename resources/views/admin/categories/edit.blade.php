@extends('admin.app')
@section('title') Edit Category @endsection
@section('content')

    <div class="container section">
        <div>
            <h3>Edit Category</h3>
        </div>
        <div class="row">
            <form class="col s12"  action="{{ route('admin.categories.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input type="hidden" name="id" value="{{ $targetCategory->id }}">
                        <input type="text" id="name" name="name" value="{{ old('name', $targetCategory->name) }}" autofocus />
                        <label for="name">Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="description" class="materialize-textarea">{{ old('description', $targetCategory->description) }}</textarea>
                        <label for="description">Description</label>
                    </div>
                </div>

                <div class="row">
                    <label>Parent Category</label>
                    <div class="input-field col s12">
                        <select name="parent_id" class="browser-default">
                            <option value="" disabled selected>Select a parent category</option>
                            @foreach($categories as $category)
                                @if ($targetCategory->parent_id == $category->id)
                                    <option value="{{ $category->id }}" selected> {{ $category->name }} </option>
                                @else
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <p>
                    <label>
                        <input type="checkbox" class="filled-in" {{ $targetCategory->featured == 1 ? 'checked' : '' }} id="featured" name="featured"/>
                        <span>Featured Category</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input type="checkbox" class="filled-in"  {{ $targetCategory->menu == 1 ? 'checked' : '' }}  id="menu" name="menu"/>
                        <span>Show in Menu</span>
                    </label>
                </p>

                <div class="input-field col s12">
                    <button class="waves-effect waves-light btn" type="submit">Update Category</button>
                    <a class="waves-effect waves-light btn red" href="{{ route('admin.categories.index') }}">Cancel</a>
                </div>

            </form>
        </div>
    </div>
@endsection
