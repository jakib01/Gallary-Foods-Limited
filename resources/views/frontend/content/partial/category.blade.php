<section id="shop" class="shop-4 pt-0">
    <div class="container">

        <div class="row">
            <!-- Projects Filter
            ============================================= -->
            <br>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 shop-filter">
                <ul class="list-inline">
                    <br>
                    <li>
                        <a class="active-filter" href="#" data-filter="*" style="font-weight: bold;">Categories</a>
                    </li>
                </ul>
            </div>
            <!-- .projects-filter end -->
        </div>
        <!-- .row end -->

        <!-- Projects Item
        ============================================= -->
            <div id="shop-all" class="row">
           @foreach($categories_item as $category)
            <!-- Product Item #1 -->
            <div class="col-xs-12 col-sm-6 col-md-3 product-item filter-best">
                <a href="/subcategory/{{$category->id}}">
                    <div class="product-img">
                        <img src=" {{'/img/categorySubcategory/category/'. $category->image}}" alt="product" style="width: 270px;height: 343px;">
                    </div>
                </a>
                <!-- .product-img end -->
                <div class="product-bio">
                    <h4>
                        <a href="/subcategory/{{$category->id}}" style="color: #334bc5;">{{$category->name}}</a>
                    </h4>
{{--                    <p class="product-price">$68.00</p>--}}
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
