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
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-heading active">
                                            <li class="active" data-filter="*">All</li>
                                        </div>
                                    </div>
                                @foreach($categories as $category)
                                    <div class="card">
                                        <div class="card-heading active">
                                            <li data-filter=".{{$category->name}}">{{$category->name}}</li>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row property__gallery">
                        @foreach($products as $product)
                        <div class="col-6 col-md-4 col-lg-4 col-xl-3 mix {{$product->categories->name}}">
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
                        <div class="col-lg-12">
                            <div class="pagination__option">
                                {{$products->onEachSide(1)->links()}}   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer bg-dark">
    @include('footer.index')
    </footer>
    <!-- Footer Section End -->

   
</body>

</html>