<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')


@section('title')
    <title>Add product</title>

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

{{--                            @foreach($categories as $category)--}}

                                <tr>
                                    <th scope="row">1</th>
                                    <th scope="row">Iphone 4</th>
                                    <th scope="row">2.400.000</th>
                                    <th scope="row">
                                        <img src="" alt="">
                                    </th>
                                    <th scope="row">Dien thoai</th>

                                    <td>
                                        <a href="" class="btn btn-warning">Sua</a>
                                        <a href="" class="btn btn-danger">Xoa</a>
                                    </td>

                                </tr>

{{--                            @endforeach--}}

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
{{--                        {{ $categories->links() }}--}}
                    </div>




                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>


@endsection






