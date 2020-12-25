

@extends('layouts.admin')


@section('title')
    <title>Trang chu</title>

@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('admins\slider\index\index.css') }}">--}}

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('admins\slider\index\index.js') }}"></script>

@endsection


@section('content')

    <style>
        svg{
            display: none !important;
        }
    </style>


    <div class="content-wrapper">
    @include('partials.content-header',['name'=>'Role','key'=>'list'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2">
                            Add
                        </a>

                    </div>

                    <div class="col-md-12">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Ten vai tro</th>
                                <th scope="col">Mo ta vai tro</th>

                                <th scope="col">Chuc Nang</th>

                            </tr>
                            </thead>
                            <tbody>
                            {{--                 {{dd($sliders)}}--}}
                            @foreach($roles as $role)

                                <tr>
                                    <th scope="row">{{ $role->id }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->display_name }}</td>


                                    <td>
                                        <a href="{{ route('roles.edit',['id'=>$role->id]) }}" class="btn btn-warning">Sua</a>
                                        <a href="{{ route('roles.delete',['id'=>$role->id]) }}" class="btn btn-danger action_delete"
                                           data-url="{{ route('roles.delete',['id'=>$role->id]) }}">Xoa</a>
                                    </td>

                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        {{ $roles->links() }}
                    </div>




                </div>

            </div>
        </div>

    </div>


@endsection








