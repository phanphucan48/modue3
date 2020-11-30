<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
<h1 class="text-center bg-danger ">Danh sách khách hàng</h1>
<a class="btn btn-success" href="{{  route('customer.create') }}">ADD</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">STT</th>
        <th scope="col">Họ và tên</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Email</th>
        <th scope="col">Thao Tac</th>
    </tr>
    </thead>
    <tbody>

    @if(isset($customers))

         @foreach($customers as $key=>$customer)
             <tr>
                <th scope="row">{{ $customer['id'] }}  </th>
                 <td>{{ $customer['name'] }}</td>
                 <td>{{ $customer['phone'] }}</td>
                 <td>{{ $customer['email'] }}</td>
                  <td>
                    <a class="btn btn-warning" href="{{ route('customer.show',$customer['id']) }}">Xem</a>
                  </td>
             </tr>
          @endforeach
    @endif

    </tbody>
</table>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
