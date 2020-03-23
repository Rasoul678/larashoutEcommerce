@extends('admin.app')
@section('title') Products @endsection
@section('content')

    <div class="container mt-5">
        <h1 class="mt-5 rounded-pill bg-dark text-center p-3 text-light"> Products</h1>
        <div class="mt-5">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-lg" role="button">Add Product</a>
        </div>
        <div class="mt-5">
            <h2>Products</h2>
            <div>
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th> # </th>
                        <th> SKU </th>
                        <th> Name </th>
                        <th class="text-center"> Categories </th>
                        <th class="text-center"> Price </th>
                        <th class="text-center"> Status </th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td><h4>{{ $product->id }}</h4></td>
                            <td><h5>{{ $product->sku }}</h5></td>
                            <td><h5>{{ $product->name }}</h5></td>
                            <td>
                                @foreach($product->categories as $category)
                                    <h4><span class="badge badge-primary">{{ $category->name }}</span></h4>
                                @endforeach
                            </td>
                            <td><h5>$ {{ $product->price }}</h5></td>
                            <td>
                                @if ($product->status == 1)
                                    <h4><span class="badge badge-success text-dark">Active</span></h4>
                                @else
                                    <h4><span class="badge badge-danger">Not Active</span></h4>
                                @endif
                            </td>
                            <td>
                                <div>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning" role="button"><i class="material-icons">edit</i></a>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <a href="{{ route('admin.products.delete', $product->id) }}" class="btn btn-danger" role="button"><i class="material-icons">delete_forever</i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
