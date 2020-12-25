
<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')


@section('title')
    <title>Setting</title>

@endsection


@section('content')


    <div class="content-wrapper">
    @include('partials.content-header',['name'=>'setting','key'=>'edit'])
    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('setting.update',['id'=>$setting->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label >Config key</label>
                                <input type="text"
                                       class="form-control @error('config_key') is-invalid @enderror"
                                       placeholder="Nhap Config key"
                                       name="config_key"
                                       value="{{ $setting->config_key }}"
                                >
                                @error('config_key')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>


                            @if(request()->type === 'text')

                                <div class="form-group">
                                    <label >Config value</label>
                                    <input type="text"
                                           class="form-control @error('config_value') is-invalid @enderror"
                                           placeholder="Nhap Config value"
                                           name="config_value"
                                           value="{{ $setting->config_value }}"
                                    >
                                    @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            @elseif(request()->type === 'textarea')
                                <div class="form-group">
                                    <label >Config value</label>
                                    <textarea type="text"
                                              class="form-control @error('config_value') is-invalid @enderror"
                                              placeholder="Nhap Config value"
                                              name="config_value"

                                    > {{ $setting->config_value }}</textarea>
                                    @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif



                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>






                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>


@endsection





