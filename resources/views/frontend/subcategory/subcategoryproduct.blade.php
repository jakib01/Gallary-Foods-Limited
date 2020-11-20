@extends('frontend.subcategory.layout.master')
@section('content')

    <!-- start main content -->
    <main class="main-container">
        <section class="men_area pt-40">
            <div class="container">
                <div class="row">
                    @foreach($sub_categories_item as $category)
                        <h1 style="text-align: center"><b>{{$category->p_name}}</b></h1>
                        @break
                    @endforeach

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="kat-shoe-bg imgframe6">
                                    <img src="/img/categorySubcategory/large-banner-4.png" alt=""/>
                                </div>
                            </div>
                        </div>

                        <div id="shop-all" class="row">
                        @foreach($sub_categories_item as $category)
                            <!-- Product Item #1 -->
                            <div class="col-xs-12 col-sm-6 col-md-4 product-item filter-best">
                                <a href="/subcategory/{{$category->c_id}}">
                                    <div class="product-img">
                                        <img src="{{'/img/categorySubcategory/subcat/'.$category->image }}" alt="product" style="margin-left: 40px; width:270px;height: 343px;">
                                    </div>
                                    <!-- .product-img end -->
                                </a>
                                <div class="product-bio">
                                    <h4>
                                        <a href="/subcategory/{{$category->c_id}}">{{$category->name}}</a>
                                    </h4>
                                </div>
                                <!-- .product-bio end -->
                            </div>
                            <!-- .product-item end -->
                        @endforeach
                        </div>
                    </div>

                </div>   <!-- /.col-md-3 -->
            </div>
        </section>





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
    </main>
    <!-- end main content -->


@endsection
