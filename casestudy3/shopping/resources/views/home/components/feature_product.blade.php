<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

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

<script>
    function addTocart(event){
        event.preventDefault();
        let url = $(this).data('url');
       $.ajax({
            type:"GET",
           url : url,
           dataType:'json',
           success:function (data){
                if(data.code ===200){
                    alert('Them san pham thanh cong');
                }

           },
           error: function (){

           }


       });
    }

    $(function (){

        $('.add_to_cart').on('click', addTocart);

    });
</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
