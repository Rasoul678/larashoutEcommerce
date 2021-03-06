@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
    <div class="container">
        <h1 class="mt-5 rounded-pill bg-dark text-center p-3 text-light"> Dashboard</h1>
        <div class="row mt-5">
            <div class="col-md-2">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h4 class="card-title text-white">Users</h4>
                        <h4 class="card-subtitle mb-2 text-white"><span class="badge badge-warning">76</span></h4>
                        <a href="#" class="btn btn-primary">Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h4 class="card-title text-white">Likes</h4>
                        <h4 class="card-subtitle mb-2 text-white"><span class="badge badge-warning">1000</span></h4>
                        <a href="#" class="btn btn-primary">Likes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h4 class="card-title text-white">Products</h4>
                        <h4 class="card-subtitle mb-2 text-white"><span class="badge badge-warning">500</span></h4>
                        <a href="{{route('admin.products.index')}}" class="btn btn-primary">Products</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h4 class="card-title text-white">Categories</h4>
                        <h4 class="card-subtitle mb-2 text-white"><span class="badge badge-warning">7</span></h4>
                        <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Categories</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h4 class="card-title text-white">Orders</h4>
                        <h4 class="card-subtitle mb-2 text-white"><span class="badge badge-warning">300</span></h4>
                        <a href="{{route('admin.orders.index')}}" class="btn btn-primary">Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
