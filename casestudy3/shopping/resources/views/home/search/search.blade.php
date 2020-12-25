@extends('home.layouts.master')

@section('title')

    <title>Home page</title>

@endsection

@section('css')

    <link href="{{ asset('home/home.css') }}" rel="stylesheet">

@endsection


@section('js')

    <link href="{{ asset('home/home.js') }}" rel="stylesheet">



@endsection

@section('content')

    <div class="cart_wrapper">

        <div class="features_items">

            <h2 class="title text-center">Features Items</h2>
            <div class="col-md-12">
                <a href="{{ route('show_tocart') }}" class="btn btn-primary mb-3">Show cart to check</a>

            </div>

            @foreach($products as $product )
                <div class="col-sm-4">

                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ $product->feature_image_path }}" alt="" />
                                <h2>{{ number_format($product->price)  }} VND</h2>
                                <p>{{ $product->name }}</p>
                                <a href="#"
                                   date-url = "{{ route('addtocart',['id'=>$product->id]) }}"
                                   class="btn btn-default add-to-cart add_to_cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>{{ number_format($product->price)  }} VND</h2>
                                    <p>{{ $product->name }}</p>
                                    <a href=""
                                       data-url = "{{ route('addtocart',['id'=>$product->id]) }}"
                                       class="btn btn-default add-to-cart add_to_cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{--                <div class="choose">--}}
                        {{--                    <ul class="nav nav-pills nav-justified">--}}
                        {{--                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>--}}
                        {{--                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>--}}
                        {{--                    </ul>--}}
                        {{--                </div>--}}
                    </div>
                </div>
            @endforeach
        </div>

    </div>




@endsection








