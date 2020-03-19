@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
    <div>
        <h1 class="center"> Dashboard</h1>
        <div class="row">
            <div class="col s12 m3">
                <div class="card grey darken-4 z-depth-2">
                    <div class="card-content white-text">
                        <span class="card-title">Users</span>
                        <div class="card-action">35 </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card grey darken-4 z-depth-2">
                    <div class="card-content white-text">
                        <span class="card-title">Likes</span>
                        <div class="card-action">50 </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card grey darken-4 z-depth-2">
                    <div class="card-content white-text">
                        <span class="card-title">Products</span>
                        <div class="card-action">5000</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
