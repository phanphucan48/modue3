
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
        @include('pratials.content-header',['name'=>'users','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">

                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Ten </th>
                                <th scope="col">email</th>



                            </tr>
                            </thead>
                            <tbody>



                                <tr>
                                    <th scope="row">{{ $user->id  }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td>


                                    </td>

                                </tr>


                            </tbody>

                        </table>
                        <a href="{{ route('users.list') }}" class="btn btn-success">tro ve</a>

                    </div>


                </div>

            </div>
        </div>

    </div>


@endsection





