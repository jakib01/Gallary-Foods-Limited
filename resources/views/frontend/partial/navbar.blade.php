{{--<!-- Start Loading -->--}}
{{--<section class="loading-overlay">--}}
{{--    <div class="Loading-Page">--}}
{{--        <h1 class="loader">Loading...</h1>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<!-- End Loading  -->--}}


<!-- start header -->
<header>
    <!-- Top bar starts -->
{{--    @include('frontend.partial.topbar')--}}
<!-- Top bar ends -->

    <!-- Header One Starts -->
    <div class="header-1" style="padding:0px" >
        <!-- Container -->
        <div class="container" style=" padding-left: 0px; padding-right: 0px;">
            <div class="row">

                <div class="col-md-4 col-sm-4" style="padding-right: 0px; padding-left: 0px">
                    <!-- Logo section -->
                    <div class="logo" style="display: flex; margin-left: 28px">
                        <img src="/img/logo1.jpg" alt="Nature" class="responsive" style=" width: 15%;height: 68px;padding-top: 20px;">
                        <h1 style="padding-top: 20px;"><a style="font-size: 27px !important;font-family: fantasy;color: #ff0000;font-weight: bold;" href="/">Business Gallery</a></h1>
                    </div>
                </div>

                <div class="col-md-6 col-md-offset-2 col-sm-5 col-sm-offset-3 hidden-xs">
                    <!-- Search Form -->
                    <div class="header-search">
                        <form>
                            <!-- Input Group -->
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type Something">
                                <span class="input-group-btn">
                                    <button class="btn btn-color" type="button">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <!-- Navigation starts -->

        <div class="navi">
            <div class="container">
                <div class="navy">
                    <ul>
                        <!-- Main menu -->
{{--                        @if(Request::path() ==  '/' && session()->has('user'))--}}
{{--                            <li><a href="/">URL</a></li>--}}
{{--                        @endif--}}
                        <li><a href="/">Home</a></li>
                        <li><a href="/aboutNavbar">About</a></li>

                        @if(session()->has('user'))
                            <li><a href="/afterloginhome">Profile</a> </li>
                        @endif

                        <li><a href="/">Agent</a></li>

                        <li><a href="/productsNavbar">Products</a>  {{-- can access the route with name --}}
{{--                            <ul>--}}
{{--                                <li><a href="#">Mobile & Accessories</a>--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#">iphone</a></li>--}}
{{--                                        <li><a href="#">Nokia</a></li>--}}
{{--                                        <li><a href="#">Sony</a></li>--}}
{{--                                        <li><a href="#">Samsung</a></li>--}}
{{--                                        <li><a href="#">Headphones</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}

{{--                                <li><a href="#">Food & Beverage</a>--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#">Rice</a></li>--}}
{{--                                        <li><a href="#">Drink</a></li>--}}
{{--                                        <li><a href="#">Oil</a></li>--}}
{{--                                        <li><a href="#">Hot Spices</a></li>--}}

{{--                                    </ul>--}}
{{--                                </li>--}}

{{--                                <li><a href="#">Cosmetics</a>--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#">Makeup</a></li>--}}
{{--                                        <li><a href="#">Soap</a></li>--}}
{{--                                        <li><a href="#">Facewash</a></li>--}}
{{--                                        <li><a href="#">Cream</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}

{{--                                <li><a href="#">Fashion</a>--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#">Men's Shirt</a></li>--}}
{{--                                        <li><a href="#">Women's Shirt</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}

{{--                                <li><a href="#">Sports</a>--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#">Menu</a></li>--}}
{{--                                        <li><a href="#">Menu</a></li>--}}
{{--                                        <li><a href="#">Menu</a></li>--}}
{{--                                        <li><a href="#">Menu</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}

{{--                                <li><a href="#">Prokashoni</a>--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#">Menu</a></li>--}}
{{--                                        <li><a href="#">Menu</a></li>--}}
{{--                                        <li><a href="#">Menu</a></li>--}}
{{--                                        <li><a href="#">Menu</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}

{{--                                <li><a href="#">Office appliance</a>--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#">Menu</a></li>--}}
{{--                                        <li><a href="#">Menu</a></li>--}}
{{--                                        <li><a href="#">Menu</a></li>--}}
{{--                                        <li><a href="#">Menu</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}

{{--                                <li><a href="#">Health care</a>--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#">Menu</a></li>--}}
{{--                                        <li><a href="#">Menu</a></li>--}}
{{--                                        <li><a href="#">Menu</a></li>--}}
{{--                                        <li><a href="#">Menu</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}

{{--                                <li><a href="#">Multi Level Menu</a>--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#">Menu #1</a></li>--}}
{{--                                        <li><a href="#">Menu #1</a></li>--}}
{{--                                        <li><a href="#">Menu #1</a>--}}
{{--                                            <ul>--}}
{{--                                                <li><a href="#">Menu #2</a></li>--}}
{{--                                                <li><a href="#">Menu #2</a></li>--}}
{{--                                                <li><a href="#">Menu #2</a>--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="#">Menu #3</a></li>--}}
{{--                                                        <li><a href="#">Menu #3</a></li>--}}
{{--                                                        <li><a href="#">Menu #3</a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}

{{--                            </ul>--}}
                        </li>
                        <li><a href="#">Award</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Success Stories</a></li>
                        @if(App\Models\cart::totalItems() >0)
                        <li>
                            <a class="nav-link btn-cart-nav" href="/carts">
                                <button class="btn btn-danger">
                                    <span class="mt-1">Cart</span>
                                    <span class="badge badge-warning" id="totalItems">
                                        {{ App\Models\cart::totalItems() }}
                                    </span>
                                </button>
                            </a>
                        </li>
                        @endif
                        @if(session()->has('user'))
                            <li><a href="#">Business Life</a></li>
                        @endif
                        @if(session()->has('user'))
                            <li><a href="#">Personal Life</a></li>
                        @endif

                        @if(session()->has('user'))
                            <li><a href="/logout"> Logout</a></li>
                        @else
                            <li><a href="/login">User/Customer</a></li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>

        <!-- Navigation ends -->

    </div>

    <!-- Header one ends -->

</header>
<!-- end header -->
