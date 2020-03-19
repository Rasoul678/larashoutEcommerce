@extends('admin.app')
@section('title') Create Category @endsection
@section('content')

    <div class="container section">
        <div>
            <h3>Add New Category</h3>
        </div>
        <div class="row">
            <form class="col s12"  action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="name" name="name" placeholder="Name" autofocus value="{{ old('name') }}">
                        <label for="name">Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="description" class="materialize-textarea">{{ old('description') }}</textarea>
                        <label for="description">Description</label>
                    </div>
                </div>

                <div class="row">
                    <label>Parent Category</label>
                    <div class="input-field col s12">
                        <select name="parent_id" class="browser-default">
                            <option value="" disabled selected>Choose a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <p>
                    <label>
                        <input type="checkbox" class="filled-in" checked="checked"  id="featured" name="featured"/>
                        <span>Featured Category</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input type="checkbox" class="filled-in" checked="checked"  id="menu" name="menu"/>
                        <span>Show in Menu</span>
                    </label>
                </p>

                <div class="input-field col s12">
                    <button class="waves-effect waves-light btn" type="submit">Save Category</button>
                    <a class="waves-effect waves-light btn red" href="{{ route('admin.categories.index') }}">Cancel</a>
                </div>

            </form>
        </div>
    </div>




{{--    <div class="form-group">--}}
{{--        <label class="control-label">Category Image</label>--}}
{{--        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>--}}
{{--        @error('image') {{ $message }} @enderror--}}
{{--    </div>--}}

@endsection
