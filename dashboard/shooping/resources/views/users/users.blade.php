
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

    <!-- Navbar -->





    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('pratials.content-header',['name'=>'users','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">

                        <form class="form-inline ml-3" action="{{ route('users.search') }}" method="post">
                            @csrf
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
{{--                        hien thi session --}}
                        @if (session()->exists('success'))
                                 <p class="bg-success"> {{  session()->get('success')}} </p>

                       @endif
                        @if (session()->exists('delete'))
                            <p class="bg-danger"> {{  session()->get('delete')}} </p>

                        @endif
                        @if (session()->exists('notsearch'))
                            <p class="bg-danger"> {{  session()->get('notsearch')}} </p>

                        @endif
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Ten </th>
                                <th scope="col">email</th>



                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $key=>$user)
    {{--                                {{ dd($users) }}--}}
                                <tr>
                                <th scope="row">{{ $key+1}}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <td>
                                    <a href="{{ route('users.show',$user->id) }}" class="btn btn-success">Xem</a>
                                    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning">Sua</a>
                                    <a href="{{ route('users.delete',$user->id) }}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xoa</a>
                                </td>

                            </tr>
                                                        @endforeach

                            </tbody>

                        </table>
                        {{ $users->links() }}

                    </div>



                </div>

            </div>
        </div>

    </div>


@endsection





