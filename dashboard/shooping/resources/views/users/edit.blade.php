
@extends('layout.admin')
@section('title')
    <title>edit</title>

@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('pratials.content-header',['name'=>'nguoi dung','key'=>'edit'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">sua thong tin nguoi dung</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('users.update', $user->id ) }} " method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label >Ten </label>
                                        <input type="text"
                                               class="form-control"
                                               name="name"
                                               value="{{ $user->name }}">

                                    </div>
                                    <div class="form-group">
                                        <label >email </label>
                                        <input type="email"
                                               class="form-control"
                                               name="email"
                                               value="{{ $user->email }}">

                                    </div>



                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->






@endsection



