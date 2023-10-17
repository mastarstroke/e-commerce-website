<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User | Orders</title>
  @include('header.index')
    <!-- css here including datatable css file  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
</head>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

  <!-- Navbar -->
  @include('header.menu')

  <!-- /.navbar -->

    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>My Orders</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('order-histories')}}" class="btn btn-warning float-right">Order History</a>
                </div>
            </div>
        </div><!-- card-header end  -->

        <div class="card-body my-5">
            <table id="table_id" class="display">
                <!-- datatable start  -->
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>                
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->fname}}</td>
                        <td>&#x20A6;{{$order->total_price}}</td>
                        <td>{{$order->status == '0' ?'pending' : 'completed'}}</td>

                        <td><small class="badge badge-primary">
                        {{(new DateTime($order->created_at))->format('Y-m-d H:i:s')}}</small></td>
                        <!-- orders date for each loop  -->

                        <td class="px-3">
                            <a href="{{route('view-order', $order->id )}}" class="btn btn-outline-primary">View</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table><!-- datatable end -->
        </div><!-- Card-body end  -->

      </div>
    </section >

<!-- Footer Section Begin -->
<footer class="footer bg-dark">
  @include('footer.index')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function() {
    $('#table_id').DataTable();
});
</script>
</body>
</html>
