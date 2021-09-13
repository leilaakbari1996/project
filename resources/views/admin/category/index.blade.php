@extends('admin.layout.master')
@section('content')
    <div class="wrapper">





    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>لیست دسته بندی ها</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">خانه</a></li>
                <li class="breadcrumb-item active">لیست دسته بندی ها</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">

                </div>
                <!-- /.card-header -->
                <div class="card-body">

                     @if ($categories->count() == 0)
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-check"></i> توجه!</h5>
                            در حال حاضر هیچ دسته بندی وجود ندارد
                            <a href="{{route('admin.category.create')}}"
                            class="btn btn-sm btn-dark" style="text-decoration: none">اضاف کردن دسته بندی</a>
                        </div>
                     @else
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>دسته بندی</th>
                                <th>والد</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->title}}
                                        </td>
                                        <td>
                                            {{optional($category->parent)->title}}
                                        </td>
                                        <td>
                                            <a href="{{route('admin.category.edit',$category)}}">ویرایش</a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.category.destroy',$category)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-sm btn-danger" value="حذف">
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                        </table>


                        </table>
                     @endif
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
<!-- ./wrapper -->
@endsection


