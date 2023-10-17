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

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg"
                    data-setbg="img/categories/category-1.jpg">
                    <div class="categories__text">
                        <h1>Women’s fashion</h1>
                        <p>Women’s quality wears and fashion icons only.</p>
                        <a href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/category-2.jpg">
                            <div class="categories__text mb-5">
                                <h4>Quality Bags</h4>
                                <p>358 items</p>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/category-3.jpg">
                            <div class="categories__text" style="margin-bottom: 210px; margin-left: 40px;">
                                <h4>Exclusive Shoes</h4>
                                <p>273 items</p>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">All</li>
                    @foreach($categories as $category)
                    <li data-filter=".{{$category->name}}">{{$category->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row property__gallery">
            @foreach($products as $product)
            <div class="col-6 col-md-4 col-lg-4 col-xl-3 mb-5 mix {{$product->categories->name}}">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="/productimage/{{$product->image}}">
                            <div class="label new">New</div>
                                <ul class="product__hover">
                                    <li><a href="/productimage/{{$product->image}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                    <li>
                                    <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById
                                        ('addtowishlist-{{$product->id}}').submit();"> <span class="icon_heart_alt"></span></a>
                                            <form action="{{route('addtowishlist', $product->id)}}" syle="display: none;"
                                                method="post" id="addtowishlist-{{$product->id}}">
                                                @csrf
                                                @method('POST')
                                            </form>
                                
                                    </li>
                                    <li>
                                    <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById
                                        ('addtocart-{{$product->id}}').submit();"> <span class="icon_bag_alt"></span></a>
                                            <form action="{{route('addtocart', $product->id)}}" syle="display: none;"
                                                method="post" id="addtocart-{{$product->id}}">
                                                @csrf
                                                @method('POST')
                                            </form>
                                    </li>
                                </ul>
                            </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{$product->name}}</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price float-left px-4"><span> <s> &#x20A6;{{$product->original_price}} </s> </span></div>
                            <div class="product__price px-4"> &#x20A6;{{$product->selling_price}}</div>
                        </div>
                    </div>
            </div>
            @endforeach
                <a class="btn btn-secondary m-auto w-50" href="{{route('shop')}}">See more products?</a>
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="img/banner/banner-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Wears Collection</span>
                            <h1>The Project Gowns</h1>
                            <a href="{{route('shop')}}">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Shoes Collection</span>
                            <h1>The Project Sandals</h1>
                            <a href="{{route('shop')}}">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Bags Collection</span>
                            <h1>The Project Bags</h1>
                            <a href="{{route('shop')}}">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Trend Section Begin -->
<section class="trend spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Hot Trend</h4>
                    </div>
                    @foreach($trendings as $trending)
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img width="100" height="100" src="/productimage/{{$trending->image}}" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>{{$trending->name}}</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price"> &#x20A6;{{$trending->selling_price}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Best seller</h4>
                    </div>
                    @foreach($bestSells as $bestSell)
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img width="100" height="100" src="/productimage/{{$bestSell->image}}" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>{{$bestSell->name}}</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price"> &#x20A6;{{$bestSell->selling_price}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trend Section End -->

<!-- Discount Section Begin -->
<section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="img/discount.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Discount</span>
                        <h2>Summer 2023</h2>
                        <h5><span>Sale</span> 50%</h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>22</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>46</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>05</span>
                            <p>Sec</p>
                        </div>
                    </div>
                    <a href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over $99</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->


<!-- Footer Section Begin -->
<footer class="footer bg-dark">
  @include('footer.index')
</body>

</html>