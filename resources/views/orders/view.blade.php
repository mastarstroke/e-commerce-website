<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User | Orders</title>
  @include('header.index')
    <!-- css here including datatable css file  -->
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
                        <span>View Order</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

<div class="card">

    <div class="card-header">
        <h4 class="text-black">Orders View
            <a href="{{route('my-orders')}}" class="btn btn-warning text-white float-right">Back</a>
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
                </div><!-- col-lg-5 end  -->
            </div><!-- row end  -->

        </div><!-- card-body end  -->
        </div><!-- card end  -->


    </div>
</section >

<!-- Footer Section Begin -->
<footer class="footer bg-dark">
  @include('footer.index')

</body>
</html>
