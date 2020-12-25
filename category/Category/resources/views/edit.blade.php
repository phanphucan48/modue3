<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="container-fluid">
        <form action=" {{ route('update',$products->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">tên san pham</label>
                <input type="text" class="form-control "  name="name" value="{{ $products->name }}">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giá</label>
                <input type="text" class="form-control "  name="price" value="{{ $products->price }}" >

            </div>

            <div class="form-group">
                <select name="product_id" id="">
                    @foreach($categorys as $category )
                        @if($category->id == $products->product_id)
                        <option value="{{ $category->id }}" selected >{{ $category->description }}</option>
                        @else
                            <option value="{{ $category->id }}"  >{{ $category->description }}</option>
                        @endif
                    @endforeach
                </select>
            </div>



            <button type="submit" class="btn btn-primary">lưu </button>
        </form>



    </div>
</div>






<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
