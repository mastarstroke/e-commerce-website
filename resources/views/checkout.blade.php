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

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                    here to enter your code.</h6>
                </div>
            </div>
            <form action="{{route('place-order')}}" class="checkout__form" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing detail</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>First Name <span>*</span></p>
                                    <input type="text" name="fname" value="{{ Auth::user()->name }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Last Name <span>*</span></p>
                                    <input type="text" name="lname" value="{{ Auth::user()->lname }}" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Country <span>*</span></p>
                                    <input type="text" name="country" value="{{ Auth::user()->country }}" required>
                                </div>
                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" placeholder="Street Address" name="address"  value="{{ Auth::user()->address1 }}" required>
                                </div>
                                <div class="checkout__form__input">
                                    <p>Town/City <span>*</span></p>
                                    <input type="text" name="city" value="{{ Auth::user()->city }}" required>
                                </div>
                                <div class="checkout__form__input">
                                    <p>State <span>*</span></p>
                                    <input type="text" name="state" value="{{ Auth::user()->state }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="text"name="email" value="{{ Auth::user()->email }}" required>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6 col-sm-6 mb-5">
                                <div class="checkout__form__input">
                                    <p>Order notes <span>(optional)</span></p>
                                    <textarea class="form-control" name="message"
                                        cols="30" rows="4"
                                        placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @if($cartViews ->count() > 0)
                            <div class="checkout__order">
                                <h5>Your order</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Product</span>
                                            <span class="top__text__right">Total</span>
                                        </li>
                                        @php $total = 0; @endphp
                                        @foreach($cartViews as $key => $cartView)

                                        <li>{{$cartView->name}} <span>{{$cartView->selling_price}}</span></li>
                                        
                                        <?php $total += $cartView->selling_price ; ?>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                    <li>Subtotal <span>&#x20A6;<?php echo $total ?></span></li>
                                    <li>Total <span>&#x20A6;<?php echo $total ?></span></li>
                                    </ul>
                                </div>
                                <div class="checkout__order__widget">
                                    <label for="o-acc">
                                        Create an acount?
                                        <input type="checkbox" id="o-acc">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p> Make your payment directly into our bank account. Please use
                                        your Order ID as the payment reference. Your order will not be
                                        shipped until the funds have cleared in our account.</p>
                                        <h4><strong> 0719304541</strong></h4>
                                        <h6><strong>ADEYEMO OLAWUNMI RUTH<strong> </h6>
                                        <h6><strong>ACCESS BANK PLC<strong></h6>
                                        <br>
                                    <div class="my-4">
                                        <h6 class="mb-3">Upload your payment receipt here</h6>

                                        @if($image)
                                        Photo Preview::
                                        <img height="100" width="100" class="mt-3" src="{{$image->temporaryUrl() }}" alt="">
                                        @endif
                                        <input type="file" name="image" required>
                                    </div>

                                </div>

                                <input type="hidden" name="total_price" value="{{$total}}">
                                <button type="submit" class="site-btn">Place oder</button>
                            </div>
                            @else
                            <h4 class="text-center">No products in cart</h4>
                            @endif
                            </div>
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->

        
    <!-- Footer Section Begin -->
<footer class="footer bg-dark">
  @include('footer.index')
</body>

</html>