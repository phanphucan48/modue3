<div class="cart" data-url="{{ route('deletecart') }}">
    <div class="container">
        <div class="row">
            <table class="table update_cart_url" data-url="{{ route('updatecart') }}">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>


                @php
                    $total = 0;
                @endphp

                @foreach($carts as $id=> $cartItem)

                    @php

                        $total += $cartItem['price']* $cartItem['quantity'];
                    @endphp



                    <tr class="quantity">
                        <th scope="row">{{ $id }}</th>
                        <td><img src="{{ $cartItem['image'] }}" style="width: 100px; height: 100px ; object-fit: contain" alt=""></td>
                        <td>{{ $cartItem['name'] }}</td>
                        <td>{{  number_format($cartItem['price'])  }} VND</td>
                        <td><input type="number" value="{{ $cartItem['quantity'] }}" min="1" class="quantity"> </td>
                        <td>{{ number_format($cartItem['price']* $cartItem['quantity'])  }} VND</td>
                        <td>
                            <a href="" data-id="{{ $id }}" class="btn btn-primary cart_update">Cap Nhat</a>
                            <a data-id="{{ $id }}" href="" class="btn btn-danger cart_delete"  onclick="return confirm('Bạn chắc chắn muốn xóa?')" >Xoa</a>
                        </td>


                    </tr>

                @endforeach

                </tbody>
            </table>

            <div class="col-md-12">
                <h2>Total :  {{ number_format($total)  }} VND</h2>
            </div>


        </div>
    </div>
</div>
