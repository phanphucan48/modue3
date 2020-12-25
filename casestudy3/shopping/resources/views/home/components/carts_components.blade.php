
    <div class="cart" data-url="{{ route('delete') }}">

        <div class="container">

            <table class="table update_cart_url" data-url = "{{ route('updateCart') }}">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Ảnh sản phẩm</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số Lương</th>
                    <th scope="col">Tổng</th>
                    <th scope="col">Chức Năng</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $total = 0;
                @endphp

                @foreach($carts as $id => $cartItem)
                    @php
                        $total += $cartItem['price']*$cartItem['quantity'];
                    @endphp
                    <tr>
                        <th scope="row">{{ $id }}</th>
                        <td><img style="width: 100px; height: 100px;" src="{{ $cartItem['image'] }}" alt=""></td>
                        <td>{{ $cartItem['name'] }}</td>
                        <td>{{ number_format($cartItem['price'])  }}VND</td>
                        <td>
                            <input type="number" value="{{$cartItem['quantity']}}" min="1" class="text-black-50 quantity">

                        </td>
                        <td>{{ number_format( $cartItem['price']*$cartItem['quantity']) }} VND</td>
                        <td>
                            <a href="" data-id="{{ $id }}" class="btn btn-success cart-update">Cập Nhật</a>
                            <a href="" data-id="{{ $id }}" class="btn btn-danger cart_delete ">Xóa</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
            <div class="col-md-12">
                <h2>Total:{{ number_format($total) }} VND </h2>
            </div>
        </div>
    </div>


