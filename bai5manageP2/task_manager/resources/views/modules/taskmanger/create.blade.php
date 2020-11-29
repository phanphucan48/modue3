<?php
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ route('customer.store') }}" method="POST">
    <h2>Thêm khách hàng</h2>
    <div class="container">
        @csrf
        <p>
            <label for="">Name</label>
            <input type="text" name="name" required>
        </p>
        <p>
            <label for="">SDT</label>
            <input type="text" name="phone" required>
        </p>
        <p>
            <label for="">email</label>
            <input type="email" name="email" required>
        </p>
        <input type="submit" name="submit" value="ADD">
    </div>
</form>
</body>
</html>

