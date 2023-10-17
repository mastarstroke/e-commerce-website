<!DOCTYPE html>
<html lang="en">
<head>
<base href="/public">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Orders</title>
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
            <h1 class="m-0">New Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Order View</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="container">
            <div class="card">

                <div class="card-header">
                    <h4 class="text-black">Orders View
                        <a href="" class="btn btn-warning text-white float-right">Back</a>
                    </h4>
                </div><!-- card-header end  -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-7">
                            <h4>Shipping Details</h4>

                            <div class="row">

                            <!-- fetching data of user from both users and order_couriers tables  -->
                                <div class="col-sm-6">
                                    <label class="mt-3">User's Name</label>
                                    <div class="border p-2">{{ $orders->fname }} {{ $orders->lname }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-3">Email</label>
                                    <div class="border p-2">{{ $orders->email }}</div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="mt-3">State</label>
                                    <div class="border p-2">{{ $orders->state }}</div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="mt-3">Phone</label>
                                    <div class="border p-2">{{ $orders->phone }}</div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="mt-3">Address</label>
                                    <div class="border p-4">
                                        {{ $orders->address }}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="mt-3">Order Note</label>
                                    <div class="border p-4">{{ $orders->message }}</div>
                                </div>
                            </div><!-- row end  -->
                        </div><!-- col-lg-7 end  -->

                        <div class="col-lg-5 mt-5 px-2">
                            <h5>Order Details</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->order_items as $item)
                                    <tr>
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->products->categories->name }}</td>
                                        <td> &#x20A6;{{ $item->price }}</td>
                                        <td>
                                            <img src="/productimage/{{$item->products->image}}"
                                                width="80px" height="80px" alt="Product image">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h6 class="px-2">Grand Total: <span class="float-end"> &#x20A6;{{ $orders->total_price }}</span><!-- Calculated grand total of price  -->
                            </h6>

                            <div>
                                <h5 class="mt-3">Payment Receipt(Bank Transfer)</h5>
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="/receipt/{{$orders->image}}">
                                        <ul class="product__hover">
                                            <li><a href="/receipt/{{$orders->image}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>  

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mt-4">
                                        <label for="">Order Status</label>
                                        <form action="{{route('update-orders', $orders->id)}}" method="POST"><!-- Form started  -->
                                            @csrf

                                            <select class="form-select" name="order_status">
                                                <option {{ $orders->status == '0'? 'selected': '' }} value="0">Pending
                                                </option><!-- if status is NEW = select pending from the option  -->

                                                <option {{ $orders->status == '1'? 'selected': '' }} value="1">Completed
                                                </option><!-- if status is 1 = select completed from the option  -->
                                            </select>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary py-1 mt-3">Update</button><!-- update option button  -->
                                                </div>
                                            </div>
                                        </form><!-- form end  -->
                                    </div><!-- Div mt-4 end  -->
                                </div><!-- col-md-5 end  -->

                                </div>

                            </div><!-- row end  -->


                        </div><!-- col-lg-5 end  -->
                    </div><!-- row end  -->

                </div><!-- card-body end  -->
            </div><!-- card end  -->

    </div><!-- container end  -->
</section >

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