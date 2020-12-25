

@extends('layouts.admin')


@section('title')
    <title>Trang chu</title>

@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins\slider\index\index.css') }}">

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
    @include('partials.content-header',['name'=>'users','key'=>'list'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <a href="{{ route('users.create') }}" class="btn btn-success float-right m-2">
                            Add
                        </a>

                    </div>

                    <div class="col-md-12">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Ten </th>
                                <th scope="col">email</th>

                                <th scope="col">Chuc Nang</th>

                            </tr>
                            </thead>
                            <tbody>
                            {{--                 {{dd($sliders)}}--}}
                            @foreach($users as $user)

                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>


                                    <td>
                                        <a href="{{ route('users.edit',['id'=>$user->id ]) }}" class="btn btn-warning">Sua</a>
                                        <a href="{{ route('users.delete',['id'=>$user->id ]) }}" class="btn btn-danger action_delete"
                                           data-url="{{ route('users.delete',['id'=>$user->id ]) }}">Xoa</a>
                                    </td>

                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        {{ $users->links() }}
                    </div>




                </div>

            </div>
        </div>

    </div>


@endsection








