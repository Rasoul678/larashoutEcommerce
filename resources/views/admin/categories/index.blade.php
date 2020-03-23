@extends('admin.app')
@section('title') Categories @endsection
@section('content')
    <div class="container mt-5">
        <h1 class="mt-5 rounded-pill bg-dark text-center p-3 text-light"> Categories</h1>
        <div class="mt-5">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-lg" role="button">Add Category</a>
        </div>
        <div class="mt-5">
            <div>
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"> # </th>
                        <th scope="col"> Name </th>
                        <th scope="col"> Slug </th>
                        <th scope="col"> Parent </th>
                        <th scope="col"> Featured </th>
                        <th scope="col"> Menu </th>
                        <th ></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        @if ($category->id != 1)
                            <tr>
                                <td scope="row"><h4>{{ $category->id }}</h4></td>
                                <td scope="row"><h5>{{ $category->name }}</h5></td>
                                <td scope="row"><h5>{{ $category->slug }}</h5></td>
                                <td scope="row"><h5>{{ $category->parent->name }}</h5></td>
                                <td scope="row">
                                    @if ($category->featured == 1)
                                        <h4><span class="badge badge-success text-dark">Yes</span></h4>
                                    @else
                                        <h4><span class="badge badge-danger">No</span></h4>
                                    @endif
                                </td>
                                <td scope="row">
                                    @if ($category->menu == 1)
                                        <h4><span class="badge badge-success text-dark">Yes</span></h4>
                                    @else
                                        <h4><span class="badge badge-danger">No</span></h4>
                                    @endif
                                </td>
                                <td scope="row">
                                    <div class="row">
                                        <div class="col s6">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning" role="button"><i class="material-icons">edit</i></a>
                                        </div>
                                        <div class="col s6">
                                            <a href="{{ route('admin.categories.delete', $category->id) }}" class="btn btn-danger" role="button"><i class="material-icons">delete_forever</i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
