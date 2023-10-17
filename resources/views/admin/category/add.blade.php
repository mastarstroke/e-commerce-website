<!DOCTYPE html>
<html lang="en">
<head>
<base href="/public">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Add Categories</title>
 @include('admin.header.index')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('admin.navbar.index')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('admin.sidebar.index')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <!-- Alert here -->
        <div class="col-12">
            @include('admin.alert')
        </div>

      <div class="card">
          <div class="card-header">
              <h4>Add category</h4>
          </div>
          <div class="card-body">
              <form action="{{route('store-category')}}" method="POST">
              @csrf
              
              <div class="row">
                  <div class="col-md-6 mb-3">
                      <label for="">Category Name</label>
                      <input type="text" class="form-control" name="name">
                  </div>

                  <div class="col-md-6 mb-3">
                      <label for="">Description</label>
                      <textarea name="description" rows="3" class="form-control"></textarea>
                  </div>

                  <div class="col-md-12">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                      
                  </div>
              </form>
          </div>
      </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
@include('admin.footer.index')
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('admin.footer.js')
</body>
</html>
