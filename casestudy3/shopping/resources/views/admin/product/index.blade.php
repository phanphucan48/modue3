<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')


@section('title')
    <title>Add product</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins\product\index\list.css') }}">

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('admins\product\index\list.js') }}"></script>

@endsection


@section('content')

    <style>
        svg{
            display: none !important;
        }
    </style>


    <div class="content-wrapper">
    @include('partials.content-header',['name'=>'product','key'=>'list'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">
                            Add
                        </a>

                    </div>

                    <div class="col-md-12">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Ten San Pham</th>
                                <th scope="col">Gia</th>
                                <th scope="col">Hinh anh</th>
                                <th scope="col">Danh muc</th>
                                <th scope="col">Chuc Nang</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $productItem)

{{--                                      {{ dd($productItem) }}--}}
                                <tr>
                                    <th scope="row">{{ $productItem->id }}</th>
                                    <th scope="row">{{ $productItem->name }}</th>
                                    <th scope="row">{{ number_format($productItem->price ) }}</th>
                                    <th scope="row">
                                        <img class="product_image_150_100" src="{{ $productItem->feature_image_path }}" alt="">
                                    </th>
                                    <th scope="row">{{ $productItem->category->name }}</th>

                                    <td>
                                        <a href="{{ route('product.edit',['id'=>$productItem->id]) }}" class="btn btn-warning">Sua</a>
                                        <a href="{{ route('product.delete',['id'=>$productItem->id]) }}"
                                           class="btn btn-danger action_delete"
                                           data-url="{{ route('product.delete',['id'=>$productItem->id]) }}"
                                        >Xoa</a>
                                    </td>

                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        {{ $products->links() }}
                    </div>




                </div>

            </div>
        </div>
    </div>


@endsection






