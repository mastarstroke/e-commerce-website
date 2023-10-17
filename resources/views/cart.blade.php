<!DOCTYPE html>
<html lang="zxx">

<head>
  @include('header.index')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

  @include('header.menu')
    <!-- Header Section End -->
   
   <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
        @if($cartViews->count() > 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                 @php $total = 0; @endphp
                                @foreach($cartViews as $cartView)
                                <tr>
                                    <td class="cart__product__item">
                                        <img width="100" height="100" src="/productimage/{{$cartView->image}}" alt="">
                                        <div class="cart__product__item__title">
                                            <h6>{{$cartView->name}}</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">&#x20A6; {{$cartView->selling_price}}</td>
                                    
                                    @if($cartView->small_description == '')
                                        <td class="cart__total">No description yet...</td>
                                    @else
                                        <td class="cart__total text-dark">{{$cartView->small_description}}</td>
                                    @endif
                                
                                    <td><a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById
                                        ('delete-form-{{$cartView->id}}').submit();" class="cart__close"><span class="icon_close ml-3"></span></a>                   
                                        <form action="{{route('delete-cart', $cartView->id)}}" syle="display: none;"
                                            method="post" id="delete-form-{{$cartView->id}}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                <?php $total += $cartView->selling_price ; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="{{route('shop')}}">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="{{route('cart-view')}}"><span class="icon_loading"></span> Update cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-2 m-auto">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>&#x20A6;<?php echo $total ?></span></li>
                            <li>Total <span>&#x20A6;<?php echo $total ?></span></li>
                        </ul>
                        <a href="{{route('checkout')}}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
            @else
                <div class="text-center">
                    <h2 class="text-danger">Your <i class="icon_bag_alt"></i>Cart is empty
                    </h2>
                    <div class="cart__btn mt-5">
                        <a href="{{route('shop')}}">Go Shopping</a>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- Shop Cart Section End -->

    <!-- Footer Section Begin -->
<footer class="footer bg-dark">
  @include('footer.index')
</body>

</html>
