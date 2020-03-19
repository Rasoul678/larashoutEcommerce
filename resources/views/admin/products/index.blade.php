@extends('admin.app')
@section('title') Products List @endsection
@section('content')

    <div class="section center">
        <a href="{{ route('admin.products.create') }}" class="waves-effect waves-light btn right">Add Product</a>
    </div>
    <div class="cat-table">
        <h3 class="center">Products</h3>
        <div>
            <table>
                <thead>
                <tr>
                    <th> # </th>
                    <th> SKU </th>
                    <th> Name </th>
                    <th class="text-center"> Categories </th>
                    <th class="text-center"> Price </th>
                    <th class="text-center"> Status </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            @foreach($product->categories as $category)
                                <span class="new badge blue" data-badge-caption="{{ $category->name }}"></span>
                            @endforeach
                        </td>
                        <td>$ {{ $product->price }}</td>
                        <td>
                            @if ($product->status == 1)
                                <span class="new badge" data-badge-caption="Active"></span>
                            @else
                                <span class="new badge red" data-badge-caption="Not Active"></span>
                            @endif
                        </td>
                        <td>
                            <div class="row">
                                <div class="col s6">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="waves-effect waves-light btn orange"><i class="material-icons">edit</i></a>
                                </div>
                                <div class="col s6">
                                    <a href="{{ route('admin.products.delete', $product->id) }}" class="waves-effect waves-light btn red"><i class="material-icons">delete_forever</i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
