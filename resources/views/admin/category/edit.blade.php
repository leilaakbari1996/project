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
            <h1>ویرایش دسته بندی {{$categoryMain->title}}</h1>
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
                    <form action="{{route('admin.category.update',$categoryMain)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="category_id"> دسته بندی والد</label>
                            <select class="form-control select2" style="width: 100%;" name="category_id">
                              <option selected="selected" value="">دسته بندی والد را انتخاب کنید</option>
                              @foreach ($categories as $category)
                                  <option value="{{$category->id}}"
                                    @if ($categoryMain->category_id == $category->id)
                                        selected
                                    @endif
                                    >{{$category->title}}</option>
                              @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="title">عنوان دسته بندی</label>
                            <input type="text" name="title" style="width: 100%" value="{{$categoryMain->title}}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="ویرایش دسته بندی">
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
