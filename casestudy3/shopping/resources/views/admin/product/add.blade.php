
<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')


@section('title')
    <title>Add product</title>

@endsection

@section('css')
    <link href="{{  asset('vendors/select2/select2.min.css')}} " rel="stylesheet" />
    <link href="{{  asset('admin1/product/add/add.css') }}" rel="stylesheet" />


@endsection





@section('content')


    <div class="content-wrapper">
    @include('partials.content-header',['name'=>'Thêm','key'=>'Sản phẩm'])
    <!-- Main content -->

        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
{{--                       luu y enctype="multipart/form-data them o sau form de up anh len--}}

                            @csrf
                            <div class="form-group">
                                <label >Tên sản phẩm</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="nhập tên sản phẩm"
                                       name="name"
                                >

                            </div>

                            <div class="form-group">
                                <label >Giá Sản Phẩm</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập Giá Sản Phẩm"
                                       name="price">

                            </div>

                            <div class="form-group">
                                <label >Ảnh Đại Diện</label>
                                <input type="file"
                                       class="form-control-file"

                                       name="feature_image_path">

                            </div>

                            <div class="form-group">
                                <label >Ảnh Chi Tiết</label>
                                <input type="file"
                                       multiple
{{--                                       them multiple vao de them anh --}}
                                       class="form-control-file"

                                       name="image_path[]">

                            </div>



                            <div class="form-group">
                                <label > Chọn Danh Mục </label>
                                <select class="form-control select2_init" name="parent_id">
                                    <option value="" >Chọn Danh Mục </option>
                                    {{--                                    phai dung {! !} de bien chuoi --}}

                                    {!! $htmlOption !!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label > Nhập tags cho sản phẩm</label>
                            <select class="form-control tags_select_choose" name="tags[]" multiple="multiple">

                            </select>
                            </div>


                    </div>


             <div class="col-md-12">
                 <div class="form-group">
                     <label>Nhập nội dung</label>
                     <textarea name="content" class="form-control tinymce_editor_init"  rows="8"></textarea>
                 </div>
             </div>

             <div class="col-md-12">
                 <button type="submit" class="btn btn-primary">Submit</button>
             </div>
                </div>

            </div>
        </div>
        </form>
    </div>


@endsection

@section('js')

    <script src="{{  asset('vendors/select2/select2.min.js')}}"></script>

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script src="{{  asset('admin1/product/add/add.js')}}"></script>

@endsection


