
<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')


@section('title')
    <title>Trang chu</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/roles/add/add.css') }}">


@endsection



@section('js')
    <script src="{{ asset('admins/roles/add/add.js') }}"></script>
@endsection



@section('content')


    <div class="content-wrapper">
    @include('partials.content-header',['name'=>'Roles','key'=>'edit'])
    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('roles.update',['id'=> $role->id]) }}" method="post" enctype="multipart/form-data" style="width: 100%;">

                    <div class="col-md-12">

                            @csrf
                            <div class="form-group">
                                <label >Ten vai tro</label>
                                <input type="text"
                                       class="form-control "
                                       placeholder="Nhap Ten vai tro"
                                       name="name"
                                       value="{{ $role->name }}"

                                >


                            </div>

                            <div class="form-group">
                                <label >Mô tả vai tro</label>

                                <textarea  class="form-control"
                                          placeholder="Nhap Mo ta vai tro"
                                          name="display_name"  rows="5">
                                    {{ $role->display_name }}
                                </textarea>


                            </div>


                    </div>

                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-12">
                                <label >
                                    <input type="checkbox" class="checkall">
                                    CheckAll
                                </label>
                            </div>


                            @foreach($permissionsParent as $permissionsParentItem)
                            <div class="card border-primary mb-3 col-md-12" >
                                <div class="card-header">
                                    <lable>
                                        <input type="checkbox" value="" class="checkbox_wrapper">
                                    </lable>
                                    Model {{$permissionsParentItem->name}}
                                </div>
                                <div class="row">
                                   @foreach($permissionsParentItem->permissionChildrent as $permissionChildrentItem)
                                        <div class="card-body text-primary col-md-3">
                                            <h5 class="card-title">
                                                <lable>

                                                    <input type="checkbox" name="permission_id[]"
                                                           {{ $permissionsChecked->contains('id',$permissionChildrentItem->id) ? 'checked': ''}}
                                                           class="checkbox_childrent"
                                                           value="{{ $permissionChildrentItem->id }}">
                                                </lable>
                                                {{ $permissionChildrentItem->name }}
                                            </h5>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach


                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>



                </div>

            </div>
        </div>

    </div>


@endsection







