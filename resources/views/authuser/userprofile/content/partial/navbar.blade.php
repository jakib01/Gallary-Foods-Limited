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
                        <li><a href="/">Home</a></li>

                        @if(session()->has('user'))
                            <li><a href="/userprofile">My Profile</a></li>
                        @endif

                        @if(session()->has('user'))
                            <li><a href="/edituserprofile">Update Profile</a></li>
                        @endif

                        @if(session()->has('user'))
                            <li><a href="#">My Investment</a></li>
                        @endif

                        @if(session()->has('user'))
                            <li><a href="#">My Insurance</a></li>
                        @endif

                        @if(session()->has('user'))
                            <li><a href="#">Update Password</a></li>
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
