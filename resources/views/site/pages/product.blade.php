@extends('layouts.app')
@section('title', $product->name)
@section('content')
    <section class="section-pagetop">
        <div class="container clearfix">
            <h2 class="title-page">{{ $product->name }}</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top" id="site">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row no-gutters">

                            <aside class="col-sm-5 border-right">
                                <article class="gallery-wrap">
                                    <div class="img-big-wrap">
                                        <div>
                                            <a href="https://via.placeholder.com/176" data-fancybox=""><img src="https://via.placeholder.com/176"></a>
                                        </div>
                                    </div>
                                </article>
                            </aside>

                            <aside class="col-sm-7">
                                <article class="p-5">
                                    <h3 class="title mb-3">{{ $product->name }}</h3>
                                    <dl class="row">
                                        <dt class="col-sm-3">SKU</dt>
                                        <dd class="col-sm-9">{{ $product->sku }}</dd>
                                        <dt class="col-sm-3">Weight</dt>
                                        <dd class="col-sm-9">{{ $product->weight }}</dd>
                                    </dl>
                                    <div class="mb-3">
                                        <var class="price h3 text-success">
                                            <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ $product->price }}</span>
                                        </var>
                                    </div>
                                    <hr>
                                    <form action="{{ route('product.add.cart') }}" method="POST" role="form" id="addToCart">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <dl class="dlist-inline">
                                                    <dt>Quantity: </dt>
                                                    <dd>
                                                        <input class="form-control" type="number" min="1" value="1" max="{{ $product->quantity }}" name="qty" style="width:70px;">
                                                        <input type="hidden" name="productId" value="{{ $product->id }}">
                                                        <input type="hidden" name="price" id="finalPrice" value="{{ $product->price }}">
                                                    </dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Add To Cart</button>
                                    </form>
                                </article>
                            </aside>

                            <div class="col-md-12">
                                <article class="card mt-4">
                                    <div class="card-body">
                                        {!! $product->description !!}
                                    </div>
                                </article>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
