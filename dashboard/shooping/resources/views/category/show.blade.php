
@extends('layout.admin')

@section('title')
    <title>Trang chu</title>

@endsection

@section('content')
    <style>
        svg{
            display: none !important;
        }
    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('pratials.content-header',['name'=>'category','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">
                        <a href="{{ route('category.add') }}" class="btn btn-success float-right m-2">THem </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ten danh muc</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>

{{--                            @foreach($categories as $category)--}}

                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{  $category->name  }}</td>
                                    <td>
                                        <a href="{{ route('category.show',['id'=> $category->id ]) }}" class="btn btn-success">Xem</a>
                                        <a href="{{ route('category.edit',['id'=> $category->id ]) }}" class="btn btn-warning">Sua</a>
                                        <a href="{{ route('category.delete',['id'=> $category->id ]) }}" class="btn btn-danger">Xoa</a>
                                    </td>

                                </tr>
{{--                            @endforeach--}}

                            </tbody>

                        </table>

                    </div>

{{--                    <div class="col-md-12">--}}
{{--                        {{ $categories->links() }}--}}
{{--                    </div>--}}

                </div>

            </div>
        </div>

    </div>


@endsection




