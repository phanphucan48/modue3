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

@include('home.components.carts_components')

    </div>



    <script
    src="https://code.jquery.com/jquery-3.5.1.slim.js"
    integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM="
    crossorigin="anonymous"></script>







<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        function cartUpdate(event){
            event.preventDefault();
           let urlUpdateCart = $('.update_cart_url').data('url');
           let id = $(this).data('id');
           let quantity = $(this).parents('tr').find('input.quantity').val();
           // alert(quantity);
           $.ajax({
               type:"GET",
               url: urlUpdateCart,
               data:{ id:id, quantity:quantity },
               success: function (data){
                       if(data.code == 200){
                           $('.cart_wrapper').html(data.cart_component);
                           alert('Cập Nhật Thành Công');

                       }
               },
               error: function (){

               }
           });

        }

        function cartdelete(event){
            event.preventDefault();
            let urlDelete = $('.cart').data('url');
            let id = $(this).data('id');
            $.ajax({
                type:"GET",
                url: urlDelete,
                data:{ id:id },
                success: function (data){
                    if(data.code == 200){
                        $('.cart_wrapper').html(data.cart_component);
                        alert('Xoa Thành Công');

                    }
                },
                error: function (){

                }
            });

        }
        $(function (){
            $(document).on('click','.cart-update', cartUpdate);
            $(document).on('click','.cart_delete', cartdelete);
        })
    </script>
@endsection







