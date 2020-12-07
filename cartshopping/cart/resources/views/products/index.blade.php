<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >

    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="{{ asset('product.css') }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Document</title>
</head>
<body>
<div class="container">
    <h3 class="h3">shopping Demo-1 </h3>
    <div class="row">
        <div class="col-md12">
            <a href="{{ route('showcart') }}" class="btn btn-primary mb-3">Show Cart to Checkout</a>
        </div>
    </div>
    <div class="row">

        @foreach($products as $product)
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                        <img class="pic-1" src="{{ $product->image_path }}">
{{--                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo9/images/img-2.jpg">--}}
                    </a>
                    <ul class="social">
                        <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                        <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
{{--                        <li><a href="" data-url="{{ route('addToCart',['id' =>  $product->id]) }}" ><i class="fa fa-shopping-cart add-to-cart "></i></a></li>--}}
                    </ul>

                    <span class="product-new-label">Sale</span>
                    <span class="product-discount-label">20%</span>
                </div>
                <ul class="rating">
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star disable"> {{ $product->description }}</li>
                </ul>
                <div class="product-content">
                    <h3 class="title"><a href="#">{{ $product->name }}</a></h3>
                        <div class="price">{{ number_format($product->price) }} VND
                        <span>$20.00</span>
                    </div>
                    <a class="add-to-cart"
                       href=""
                       data-url="{{ route('addToCart',['id' =>  $product->id]) }}"
                    >
                        <i class=" fa fa-shopping-cart">+ Add To Cart</i>

                    </a>
                </div>
            </div>
        </div>

        @endforeach
    </div>

</div>
<hr>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" ></script>

<script>
    function addToCart(event){
        event.preventDefault();
        let urlcart = $(this).data('url');
        // alert(url);
        $.ajax({
            type: "GET",
            url: urlcart,
            dataType:'json',
            success:function (data){
                if(data.code === 200){
                   alert('them san pham thanh cong');
                }
            },
            error:function (){

            }
        });
    }
    $(function (){
        $('.add-to-cart').on('click',addToCart);
    })
</script>
</body>
</html>
