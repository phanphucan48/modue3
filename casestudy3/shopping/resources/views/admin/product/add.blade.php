
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
           @include('partials.content-header',['name'=>'product','key'=>'Add'])
               <div class="col-md-12">
{{--                   @if ($errors->any())--}}
{{--                       <div class="alert alert-danger">--}}
{{--                           <ul>--}}
{{--                               @foreach ($errors->all() as $error)--}}
{{--                                   <li>{{ $error }}</li>--}}
{{--                               @endforeach--}}
{{--                           </ul>--}}
{{--                       </div>--}}
{{--                   @endif--}}
               </div>
           <!-- Main content -->

               <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                   <div class="content">
                       <div class="container-fluid">
                           <div class="row">
                               <div class="col-md-6">
                                   {{--                       luu y enctype="multipart/form-data them o sau form de up anh len--}}

                                   @csrf
                                   <div class="form-group">
                                       <label >Tên sản phẩm</label>
                                       <input type="text"
                                              class="form-control @error('name') is-invalid @enderror"
                                              placeholder="nhập tên sản phẩm"
                                              name="name"
                                              value = "{{ old('name') }}"
                                       >
                                       @error('name')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror

                                   </div>

                                   <div class="form-group">
                                       <label >Giá Sản Phẩm</label>
                                       <input type="text"
                                              class="form-control @error('price') is-invalid @enderror"
                                              placeholder="Nhập Giá Sản Phẩm"
                                              name="price"
                                              value="{{ old('price') }}"
                                       >

                                       @error('price')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror

                                   </div>

                                   <div class="form-group">
                                       <label >Ảnh Đại Diện</label>
                                       <input type="file"
                                              class="form-control-file "

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
                                       <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id">
                                           <option value="" >Chọn Danh Mục </option>
                                           {{--                                    phai dung {! !} de bien chuoi --}}

                                           {!! $htmlOption !!}
                                       </select>
                                       @error('category_id')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                   </div>

                                   <div class="form-group">
                                       <label > Nhập tags cho sản phẩm</label>
                                       <select class="form-control tags_select_choose " name="tags[]" multiple="multiple">

                                       </select>
                                   </div>


                               </div>


                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label>Nhập nội dung</label>
                                       <textarea name="contents" class="form-control tinymce_editor_init
                                        @error('contents') is-invalid @enderror"  rows="8"> {{ old('contents') }}</textarea>
                                       @error('contents')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
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


