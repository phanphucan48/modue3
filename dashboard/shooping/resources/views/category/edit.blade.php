
@extends('layout.admin')
@section('title')
    <title>Them moi</title>

@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('pratials.content-header',['name'=>'category','key'=>'Edit'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Them moi san pham</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('category.update', ['id'=>$category->id ]) }} " method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label >Ten danh muc</label>
                                        <input type="text"
                                               class="form-control"
                                               name="name"
                                               value="{{ $category->name }}"
                                               placeholder="Nhap ten danh muc">
                                    </div>

                                    <div class="form-group">
                                        <label >Chon danh muc cha</label>
                                        <select class="form-control" name ="parent_id">
                                            <option value="0">Chon danh muc cha</option>
                                            {!! $htmlOpiton !!}
                                        </select>
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


