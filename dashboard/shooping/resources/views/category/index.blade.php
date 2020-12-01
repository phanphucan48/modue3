
@extends('layout.admin')

@section('title')
    <title>Trang chu</title>

@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       @include('pratials.content-header',['name'=>'category','key'=>'List'])
        <!-- /.content-header -->

        <!-- Main content -->
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

                          @foreach($categories as $category)

                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{  $category->name  }}</td>
                                <td>
                                    <a href="" class="btn btn-default">Sua</a>
                                    <a href="" class="btn btn-danger">Xoa</a>
                                </td>

                            </tr>
                          @endforeach

                            </tbody>
                        </table>






                </div>

            </div>
        </div>

    </div>


@endsection



