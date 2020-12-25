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
    <script >
        function cartUpdate(event){
            event.preventDefault();
            let id = $(this).data('id');
            let urlUpdateCart = $('.update_cart_url').data('url');
            let quantity = $(this).parents('.cart').find('input.cart_quantity_input').val();
            alert(quantity);
            $.ajax({
                type:"GET",
                url:urlUpdateCart,
                data:{id:id ,quantity:quantity },
                success:function (data){
                    console.log(data);
                    if(data.code === 200){
                        alert('them san pham thanh cong');
                        // $('.container').html(data.cart_component);
                    }
                },
                error:function (){

                }
            });
        }

        $(function (){
            $(document).on('click','.cart_update',cartUpdate);

        });
    </script>



    <section id="advertisement">
        <div class="container">
            <img src="images/shop/advertisement.jpg" alt="" />
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                @include('components.sildebar')

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>

                        @foreach($products as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ $product->feature_image_path }}" alt="" />
                                        <h2>{{ number_format($product->price ) }}VND</h2>
                                        <p>{{ $product->name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>{{ number_format($product->price ) }}VND</h2>
                                            <p>{{ $product->name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach

                       {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection













{{--<script src="js/jquery.js"></script>--}}
{{--<script src="js/price-range.js"></script>--}}
{{--<script src="js/jquery.scrollUp.min.js"></script>--}}
{{--<script src="js/bootstrap.min.js"></script>--}}
{{--<script src="js/jquery.prettyPhoto.js"></script>--}}
{{--<script src="js/main.js"></script>--}}

