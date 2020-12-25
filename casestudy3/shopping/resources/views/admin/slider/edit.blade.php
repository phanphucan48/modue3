
<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')


@section('title')
    <title>Trang chu</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/add/add.css') }}">

@endsection


@section('content')


    <div class="content-wrapper">
    @include('partials.content-header',['name'=>'sliders','key'=>'edit'])
    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('slider.update',['id'=>$slider->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label >Ten slider</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Nhap Ten "
                                       name="name"
                                       value="{{ $slider->name }}"

                                >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label >Mô tả slider</label>

                                <textarea name="description"  class="form-control
                                        @error('description') is-invalid @enderror"
                                          placeholder="Nhap Mo ta"
                                          name="description"  rows="5">
                                    {{ $slider->description }}
                                </textarea>

                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label >Hinh anh</label>
                                <input type="file"
                                       class="form-control @error('image_path') is-invalid @enderror"
                                       placeholder="Nhap ten Menu"
                                       name="image_path"
                                >
                                <div class="col-md-4">
                                    <div class="row">
                                        <img class="image_slider" src="{{ $slider->image_path }}" alt="">
                                    </div>
                                </div>
                                @error('image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>






                </div>

            </div>
        </div>

    </div>


@endsection







