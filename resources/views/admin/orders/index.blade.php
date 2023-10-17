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
            <h1 class="m-0">New Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
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

    <div class="card-header">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('order-history')}}" class="btn btn-warning float-right">Order History</a>
            </div>
        </div>
    </div><!-- card-header end  -->

    <div class="card-body">
        <table id="table_id" class="display">
            <!-- datatable start  -->
            <thead>
                <tr>
                    <th style="padding: 7px;">Customer Name</th>
                    <th style="padding: 7px;">Total Price</th>
                    <th style="padding: 7px;">Status</th>
                    <th style="padding: 7px;">Date</th>
                    <th style="padding: 7px;">Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>                
                @foreach($orders as $order)
                <tr>
                    <td style="padding: 7px;">{{$order->fname}}</td>
                    <td style="padding: 7px;">&#x20A6;{{$order->total_price}}</td>
                    <td style="padding: 7px;">{{$order->status == '0' ?'pending' : 'completed'}}</td>

                    <td style="padding: 7px;"><small class="badge badge-primary">
                    {{(new DateTime($order->created_at))->format('Y-m-d H:i:s')}}</small></td>
                    <!-- orders date for each loop  -->

                    <td class="px-3">
                        <a href="{{route('view-orders', $order->id )}}" class="btn btn-outline-primary">View</a>
                    </td>

                    <!-- delete order here  -->
                    <td>
                        <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById
                            ('delete-form-').submit();" class="btn btn-outline-danger btn-sm"><i
                                class="fas fa-trash"></i></a>
                        <form action="" syle="display: none;" method="post"
                            id="delete-form-">
                            @csrf
                            @method('DELETE')
                        </form><!-- form end  -->
                    </td>
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
