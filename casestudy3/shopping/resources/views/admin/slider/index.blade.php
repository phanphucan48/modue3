

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
    @include('partials.content-header',['name'=>'slider','key'=>'list'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-2">
                            Add
                        </a>

                    </div>

                    <div class="col-md-12">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Ten slider</th>
                                <th scope="col">Description</th>
                                <th scope="col">Hinh ảnh</th>
                                <th scope="col">Chuc Nang</th>

                            </tr>
                            </thead>
                            <tbody>
{{--                 {{dd($sliders)}}--}}
                            @foreach($sliders as $slider)

                                <tr>
                                    <th scope="row">{{ $slider->id }}</th>
                                    <td>{{ $slider->name }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>
                                        <img class="image_slider_150_100" src="{{ $slider->image_path }}" alt="">
                                    </td>

                                    <td>
                                        <a href="{{ route('slider.edit',['id'=>$slider->id]) }}" class="btn btn-warning">Sua</a>
                                        <a href="{{ route('slider.delete',['id'=>$slider->id]) }}" class="btn btn-danger action_delete"
                                           data-url="{{ route('slider.delete',['id'=>$slider->id]) }}">Xoa</a>
                                    </td>

                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        {{ $sliders->links() }}
                    </div>




                </div>

            </div>
        </div>

    </div>


@endsection







