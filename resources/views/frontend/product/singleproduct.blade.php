@extends('frontend.product.layout.master')
@section('content')


    <!-- start main content -->
    <main class="main-container">
        <section class="product_content_area pt-40">
            <!-- start of page content -->
            <div class="lookcare-product-single container">
                <div class="row">
                    <div class="main col-xs-12" role="main">
                        @if(Session::has('success'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="text-align: center;">{{ Session::get('success') }}</p>
                        @endif
                        <div class="product">
                            <div class="row">
                                <div class="col-md-5 col-sm-6 summary-before ">
{{--                                    --}}
                                    <div class="product-slider product-shop">
{{--                                        <span class="onsale">Sale!</span>--}}
                                        <ul class="slides">
                                        @foreach($images as $image)
                                            <li  data-thumb="{{'/img/product/singleproduct/'.$image->image }}" >
                                                <a href="{{'/img/product/singleproduct/'.$image->image }}" data-imagelightbox="gallery" class="hoodie_7_front">
                                                    <img src="{{'/img/product/singleproduct/'.$image->image }}" style= "width:470px ; height:470px;" class="attachment-shop_single" alt="image">
                                                </a>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>

                                </div>

                                <div class="col-sm-6 col-md-7 product-review entry-summary">

                                    <h1 class="product_title">{{$product->title}}</h1>

{{--                                    <div class="woocommerce-product-rating">--}}
{{--                                        <div class="star-rating" title="Rated 4.00 out of 5">--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star-o"></i>--}}
{{--                                        </div>--}}
{{--                                        <a href="#reviews" class="woocommerce-review-link">(<span class="count">3</span> customer reviews)</a>--}}
{{--                                    </div>--}}

                                    <div>
{{--                                        <p class="price"> <del><span class="amount">{{$product->price}}</span> </del>--}}
{{--                                            <ins><span class="amount">$999.00</span></ins></p>--}}
                                        <p class="price"> <span class="amount">Price- {{$product->price}}</span></p>
                                    </div>
                                    <p>Size: {{$product->size}}</p>

                                    @foreach($colors as $color)
                                    <p>Color: {{$color->color}}</p>
                                    @endforeach
                                    <p>{{$product->description}}</p>

                                    <form class="variations_form cart" action="{{ route('carts.store') }}" method="post">
                                        @csrf
                                        <div class="quantity">
                                            <input type="number" step="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" min="1">
                                        </div>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="cart-button">Add to cart</button>
                                    </form>

                                    <div class="product_meta">
                                        <span class="sku_wrapper">SKU: <span class="sku">N/A</span>.</span>
                                        <span class="posted_in">Categories: <a href="#" rel="tag">Clothing</a>, <a href="#">Hoodies</a>.</span>
                                    </div>

                                    <div class="share-social-icons">
                                        <a href="#" target="_blank" title="Share on Facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#" target="_blank" title="Share on Twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#" target="_blank" title="Pin on Pinterest">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                        <a href="#" target="_blank" title="Share on Google+">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- .summary -->
                            </div>

                            <div class="wrapper-description">
                                <ul class="tabs-nav clearfix">
                                    <li class="active">Description</li>
                                </ul>
                                <div class="tabs-container product-comments">

                                    <div class="tab-content">
                                        <section class="related-products">
                                            <h2>Product Description</h2>
                                            <p>{{$product->description}}</p>
                                        </section>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end product -->



                    </div>
                    <!-- #product-293 -->
                </div>
                <!-- end of main -->
            </div>
            <!-- end of .row -->
        </div>
    </section>

        <!-- service area -->
        <section class="block gray no-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box no-margin go-simple">
                            <div class="mini-service-sec">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mini-service">
                                            <i  class="fa fa-paper-plane"></i>
                                            <div class="mini-service-info">
                                                <h3>Worldwide Delivery</h3>
                                                <p>unc tincidunt, on cursusau gmetus, lorem Hore</p>
                                            </div>
                                        </div><!-- Mini Service -->
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mini-service">
                                            <i  class="fa  fa-newspaper-o"></i>
                                            <div class="mini-service-info">
                                                <h3>Worldwide Delivery</h3>
                                                <p>unc tincidunt, on cursusa ugmetus, lorem Hore</p>
                                            </div>
                                        </div><!-- Mini Service -->
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mini-service">
                                            <i  class="fa fa-medkit"></i>
                                            <div class="mini-service-info">
                                                <h3>Friendly Stuff</h3>
                                                <p>unc tincidunt, on cursusau gmetus, lorem Hore</p>
                                            </div>
                                        </div><!-- Mini Service -->
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mini-service">
                                            <i  class="fa  fa-newspaper-o"></i>
                                            <div class="mini-service-info">
                                                <h3>24/h Support</h3>
                                                <p>unc tincidunt, on cursusa ugmetus, lorem Hore</p>
                                            </div>
                                        </div><!-- Mini Service -->
                                    </div>
                                </div>
                            </div><!-- Mini Service Sec -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- end service area -->
    </main>
    <!-- end main content -->


@endsection
