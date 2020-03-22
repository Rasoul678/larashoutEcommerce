@extends('layouts.app')
@section('title', $category->name)
@section('content')
    <section class="section-pagetop">
        <div class="container clearfix">
            <h2 class="title-page">{{ $category->name }}</h2>
        </div>
    </section>
    <section class="section-content bg padding-y">
        <div class="container">
            <div id="code_prod_complex">
                <div class="row">
                    @forelse($category->products as $product)
                        <div class="col-md-4">
                            <figure class="card card-product">

                                <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>

                                <figcaption class="info-wrap">
                                    <h4 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                                </figcaption>
                                <div class="bottom-wrap">
                                    <a href="" class="btn btn-sm btn-success float-right"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                                    <div class="price-wrap h5">
                                        <span class="price">$ {{ $product->price }} </span>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    @empty
                        <p>No Products found in {{ $category->name }}.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@stop
