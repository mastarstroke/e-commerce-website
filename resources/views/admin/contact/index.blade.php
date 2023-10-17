<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Add Categories</title>
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
            <h1 class="m-0">Messsage Recieved</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Messages</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

<div class="col-12">

    <div class="card-body">
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th style="padding: 7px;">Sl.No</th>
                    <th style="padding: 7px;">Name</th>
                    <th style="padding: 7px;">Email</th>
                    <th style="padding: 7px;">Message</th>
                    <th style="padding: 7px;">Status</th>
                </tr>
            </thead>
            <tbody>

                @foreach($contacts as $key => $contact)
                <tr>
                    <td style="padding: 7px;">{{$key + 1}}</td>
                    <td style="padding: 7px;">{{$contact->name}}</td>
                    <td style="padding: 7px;">{{$contact->email}}</td>
                    <td style="padding: 7px;">{{$contact->message}}</td>
                    @if($contact->status=="unread")
                    <td style="padding: 7px;">
                    </td>
                     @else
                    <td style="padding: 7px;"><div class="btn btn-success btn-sm"></div></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table><!-- datatable end  -->
    </div><!-- card-body end  -->
</div><!-- col-12 end -->

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

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function() {
    $('#table_id').DataTable();
});
</script>
</body>
</html>
