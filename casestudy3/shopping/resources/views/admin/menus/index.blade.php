

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
    @include('partials.content-header',['name'=>'menus','key'=>'list'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <a href="{{ route('menus.create') }}" class="btn btn-success float-right m-2">
                            Add
                        </a>

                    </div>

                    <div class="col-md-12">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Ten Menu</th>
                                <th scope="col">Chuc Nang</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($menus as $menu)

                                <tr>
                                    <th scope="row">{{ $menu->id }}</th>
                                    <td>{{ $menu->name }}</td>
                                    <td>
                                        <a href="{{ route('menus.edit',['id'=>$menu->id]) }}" class="btn btn-warning">Sua</a>
                                        <a href="{{ route('menus.delete',['id'=>$menu->id]) }}" class="btn btn-danger">Xoa</a>
                                    </td>

                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        {{ $menus->links() }}
                    </div>




                </div>

            </div>
        </div>

    </div>


@endsection






