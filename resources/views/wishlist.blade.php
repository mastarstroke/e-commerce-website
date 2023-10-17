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
                        <span>Your Wishlist</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
        @if($wishlistViews->count() > 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($wishlistViews as $wishlistView)
                                <tr>
                                    <td class="cart__product__item">
                                        <img width="100" height="100" src="/productimage/{{$wishlistView->image}}" alt="">
                                        <div class="cart__product__item__title">
                                            <h6>{{$wishlistView->name}}</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">&#x20A6; {{$wishlistView->selling_price}}</td>                               

                                    <td class="cart__product__item">
                                            <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById
                                        ('addtocart-{{$wishlistView->id}}').submit();" class="btn btn-secondary"> <span class="icon_bag_alt"></span>Add to cart</a>
                                            <form action="{{route('addtocart', $wishlistView->id)}}" syle="display: none;"
                                                method="post" id="addtocart-{{$wishlistView->id}}">
                                                @csrf
                                                @method('POST')
                                            </form>
                                
                                    <td class="cart__product__item"><a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById
                                        ('delete-form-{{$wishlistView->id}}').submit();" class="cart__close"><span class="icon_close ml-3"></span></a>                   
                                        <form action="{{route('delete-wishlist', $wishlistView->id)}}" syle="display: none;"
                                            method="post" id="delete-form-{{$wishlistView->id}}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="{{route('shop')}}">Go Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="{{route('wishlist-view')}}"><span class="icon_loading"></span> Update cart</a>
                    </div>
                </div>
            </div>

            @else

                <div class="text-center">
                    <h2 class="text-danger">Your <i class="icon_heart_alt"></i>Wishlist is empty
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
