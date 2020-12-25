<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')


@section('title')
    <title>Trang chu</title>

@endsection


@section('content')

    <style>
        svg{
            display: none !important;
        }
    </style>


    <div class="content-wrapper">
     @include('partials.content-header',['name'=>'category','key'=>'list'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        @can('category-add')

                        <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">
                            Add
                        </a>
                        @endcan

                    </div>

                    <div class="col-md-12">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Ten Danh Muc</th>
                                <th scope="col">Chuc Nang</th>

                            </tr>
                            </thead>
                            <tbody>

                           @foreach($categories as $category)

                            <tr>

                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @can('category-edit')

                                    <a href="{{ route('categories.edit',['id'=>$category->id]) }}" class="btn btn-warning">Sua</a>

                                    @endcan

                                        @can('category-delete')
                                    <a href="{{ route('categories.delete',['id'=>$category->id]) }}" class="btn btn-danger">Xoa</a>
                                        @endcan
                                </td>

                            </tr>

                           @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        {{ $categories->links() }}
                    </div>




                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>


@endsection





