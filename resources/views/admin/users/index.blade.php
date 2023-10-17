<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Orders</title>
    @include('admin.header.index')
    <!-- css here including datatable css file  -->
    @push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    @endpush
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
            <h1 class="m-0">Register Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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

<div class="col-12">

    <div class="card-body">
        <table id="table_id" class="display">
            <!-- datatable start  -->
            <thead>
                <tr>
                    <th style="padding: 10px;">Name</th>
                    <th style="padding: 10px;">Email</th>
                    <th style="padding: 10px;">Address</th>
                    <th style="padding: 10px;">State</th>
                    <th style="padding: 10px;">Phone</th>
                </tr>
            </thead>
            <tbody>                
                @foreach($users as $user)
                <tr>
                    <td style="padding: 10px;">{{$user->name}} {{$user->lname}}</td>
                    <td style="padding: 10px;">{{$user->email}}</td>
                    <td style="padding: 10px;">{{$user->address}}</td>
                    <td style="padding: 10px;">{{$user->state}}</td>
                    <td style="padding: 10px;">{{$user->phone}}</td>

                </tr>
                @endforeach
            </tbody>
        </table><!-- datatable end -->
    </div><!-- Card-body end  -->
</div><!-- col-12 end  -->

</div>
</div>

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

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function() {
    $('#table_id').DataTable();
});
</script>
</body>
</html>
