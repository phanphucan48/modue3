<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >

    <!------ Include the above in your HEAD tag ---------->
{{--    <link rel="stylesheet" href="{{ asset('product.css') }}">--}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Show Cart</title>
</head>
<body>

<div class="cart_wrapper">
@include('products.components.cart_components')
</div>





<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" ></script>
<script>
    function cartupdate(event){
        event.preventDefault();
        let urlupdatecart = $('.update_cart_url').data('url');
        let id =$(this).data('id');
        //tim cha parents la cot tr con la o input cham val
        let quantity = $(this).parents('tr').find('input.quantity').val();
        // alert(quantity);
        // dd(id);
        $.ajax({
            type:"GET",
            url: urlupdatecart,
            data:{id: id, quantity: quantity},
            success:function (data){
       // console.log(data);
                if(data.code === 200){
                   $('.cart_wrapper').html(data.cart_component);
                   alert('cap nhat thanh cong');
                }
            },
            error: function (){

            }
        });
        // alert('aaaaaaaaaa');
    }

    function cartdelete(event){
        event.preventDefault();
        let urdelete = $('.cart').data('url');
        let id =$(this).data('id');
        $.ajax({
            type:"GET",
            url: urdelete,
            data:{id: id},
            success:function (data){
                // console.log(data);
                if(data.code === 200){
                    $('.cart_wrapper').html(data.cart_component);
                    alert('xoa thanh cong');
                }
            },
            error: function (){

            }
        });

    }

    $(function (){
        $(document).on('click','.cart_update',cartupdate);
        $(document).on('click','.cart_delete',cartdelete);

    })
</script>
</body>
</html>
