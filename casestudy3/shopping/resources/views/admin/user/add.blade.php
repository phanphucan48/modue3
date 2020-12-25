
<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')


@section('title')
    <title>Trang chu</title>

@endsection

@section('css')
    <link href="{{  asset('vendors/select2/select2.min.css')}} " rel="stylesheet" />
    <link href="{{  asset('admins\user\add\add.css')}} " rel="stylesheet" />


@endsection



@section('content')


    <div class="content-wrapper">
    @include('partials.content-header',['name'=>'User','key'=>'add'])
    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label >Ten </label>
                                <input type="text"
                                       class="form-control "
                                       placeholder="Nhap Ten "
                                       name="name"
                                       value="{{old('name')}}"
                                >
                            </div>

                            <div class="form-group">
                                <label >Email</label>
                                <input type="text"
                                       class="form-control "
                                       placeholder="Nhap email "
                                       name="email"
                                       value="{{old('email')}}"
                                >
                            </div>

                            <div class="form-group">
                                <label >Password</label>
                                <input type="password"
                                       class="form-control "
                                       placeholder="Nhap password "
                                       name="password"

                                >
                            </div>
                            <div class="form-group">
                                <label >Chon vai tro</label>
                                <select name="role_id[]" class="form-control select2_init" multiple>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>






                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>






                </div>

            </div>
        </div>

    </div>
@section('js')
    <script src="{{  asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{  asset('admins\user\add\add.js')}}"></script>


@endsection

@endsection






