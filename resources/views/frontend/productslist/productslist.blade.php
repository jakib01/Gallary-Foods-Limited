@extends('frontend.productslist.layout.master')
@section('content')

<section id="shop" class="shop-4 pt-0">
    <div class="container">

        <div class="row">
            @foreach($sub_categories_item1 as $category)
            <div class="col-xs-12 col-sm-12 col-md-12 shop-filter">
                <ul class="list-inline">
                    <br>
                    <li>
                        <a class="active-filter" href="#" data-filter="*"><b>{{$category->pl_name}}</b></a>
                    </li>
                </ul>
            </div>
                @break
        @endforeach
            <!-- .projects-filter end -->
        </div>
        <!-- .row end -->


        <!-- Projects Item
        ============================================= -->
        <div id="shop-all" class="row">
            @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="text-align: center;">{{ Session::get('success') }}</p>
            @endif
        @foreach($sub_categories_item1 as $category)

            <!-- Product Item #1 -->
            <div class="col-xs-12 col-sm-6 col-md-3 product-item filter-best">
                <div class="product-img">
                    <img src="{{'/img/product/productlist/'.$category->image }}" alt="product" style="width: 270px;height: 343px;">
                    <div class="product-hover">
                        <div class="product-cart">
{{--                            <a class="btn btn-secondary btn-block" href="#">Add To Cart</a>--}}
                            <form class="form-inline" action="{{ route('carts.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $category->id }}">
                                <button class="btn btn-secondary btn-block"  type="submit" >Add To Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- .product-img end -->
                <div class="product-bio">
                    <h4>
                        <a href="/product/{{$category->slug}}">{{$category->title}}</a>
                    </h4>
                    <p class="product-price">{{$category->price}}</p>
                </div>
                <!-- .product-bio end -->
            </div>
            <!-- .product-item end -->
            @endforeach

        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>


@endsection
