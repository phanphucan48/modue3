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
<h1>Product Discount Calculator </h1>
<form action="/product" method="POST">
    @csrf
    <p>
        <label for=""> Product Description</label>
        <input type="text" name="description" >
    </p>
    <p>
        <label for="">List Price</label>
        <input type="text" name="price" >
    </p>
    <p>
        <label for="">Discount Percent</label>
        <input type="text" name="percent" >
    </p>
    <p>
        <button type="submit">Calculate Discount</button>
    </p>
</form>

</body>
</html>
