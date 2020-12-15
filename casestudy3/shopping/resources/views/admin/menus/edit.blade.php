
<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')


@section('title')
    <title>Trang chu</title>

@endsection


@section('content')


    <div class="content-wrapper">
    @include('partials.content-header',['name'=>'menus','key'=>'edit'])
    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('menus.update',['id'=>$menuFollowIdEdit->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label >Ten Menus</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhap ten Menus"
                                       name="name"
                                       value="{{ $menuFollowIdEdit->name }}"
                                >

                            </div>

                            <div class="form-group">
                                <label > Chon menus cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0" >Chon danh muc cha</option>
                                    {{--                                    phai dung {! !} de bien chuoi --}}

                                    {!! $optionSelect !!}
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>






                </div>

            </div>
        </div>

    </div>


@endsection





