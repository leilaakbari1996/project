@extends('admin.layout.master')
@section('content')

<div class="wrapper">



  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ویرایش برند {{$brand->title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">ویرایش دسته بندی</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                    <form action="{{route('admin.brand.update',$brand)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="title">عنوان برند</label>
                            <input type="text" name="title" style="width: 100%" value="{{$brand->title}}">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="image">تصویر</label>
                                    <input type="file" class="formcontrol" id="image" name="image">
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{str_replace('public/brand','/storage/image',$brand->image)}}"
                                    title="{{$brand->name}}" alt="{{$brand->title}}" width="100"/>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="ویرایش برند">
                        </div>
                    </form>

              </div>
              <!-- /.col -->

            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->


      </div><!-- /.container-fluid -->
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
