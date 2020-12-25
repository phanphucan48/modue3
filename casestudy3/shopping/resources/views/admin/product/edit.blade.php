
<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')



@section('title')
    <title>Add product</title>

@endsection

@section('css')
    <link href="{{  asset('vendors/select2/select2.min.css')}} " rel="stylesheet" />
    <link href="{{  asset('admins/product/add/add.css') }}" rel="stylesheet" />


@endsection





@section('content')

    <div class="container">
        <div class="content-wrapper">
        @include('partials.content-header',['name'=>'product','key'=>'edit'])
        <!-- Main content -->
{{--        {{ dd($product->id) }}--}}
            <form action="{{ route('product.update',['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
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
                                           value="{{ $product->name }}"
                                    >

                                </div>

                                <div class="form-group">
                                    <label >Giá Sản Phẩm</label>
                                    <input type="text"
                                           class="form-control"
                                           value="{{ $product->price }}"
                                           name="price">

                                </div>

                                <div class="form-group">
                                    <label >Ảnh Đại Diện</label>
                                    <input type="file"
                                           class="form-control-file"

                                           name="feature_image_path"
                                    >
                                            <div class="col-md-4 feature_image_container">
                                        <div class="row">
                                            <img class="feature_image" src="{{ $product->feature_image_path }}" alt="">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label >Ảnh Chi Tiết</label>
                                    <input type="file"
                                           multiple
                                           {{--                                       them multiple vao de them anh --}}
                                           class="form-control-file"

                                           name="image_path[]">
                                    <div class="col-md-12 container_image_detail">
                                        <div class="row">
{{--                                             tu product tro phuong thuc trung gian la producImages--}}
                                            @foreach($product->productImages as  $productImageItem)
                                                <div class="col-md-3">
                                                    <img class="image_detail_product" src="{{ $productImageItem->image_path }}" alt="">
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>

                                </div>



                                <div class="form-group">
                                    <label > Chọn Danh Mục </label>
                                    <select class="form-control select2_init" name="category_id">
                                        <option value="" >Chọn Danh Mục </option>
                                        {{--                                    phai dung {! !} de bien chuoi --}}

                                        {!! $htmlOption !!}
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label > Nhập tags cho sản phẩm</label>
                                    <select class="form-control tags_select_choose" name="tags[]" multiple="multiple">
                                        @foreach($product->tags as $tagItem)
{{--                                       dung option de lay cac gia tri bang tags ben phuong thuc trung gian bang product--}}
                                        <option value=" {{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nhập nội dung</label>
                                    <textarea name="contents" class="form-control tinymce_editor_init"  rows="8" >{{ $product->content }}</textarea>
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



    </div>


@endsection

@section('js')

    <script src="{{  asset('vendors/select2/select2.min.js')}}"></script>

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script src="{{  asset('admins/product/add/add.js')}}"></script>

@endsection


