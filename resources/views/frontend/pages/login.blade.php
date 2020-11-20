@extends('frontend.layout.master')
@section('content')

    <!-- start main content -->
    <main class="container" style="background-color: grey">

        <section>

            <div class="signinpanel">

                <div class="row">

                    <div class="col-md-10 col-md-offset-1">

                        <form class="signupLogin-form" style="background-color: #2f2a2a" action="user" method ="POST">
                            @csrf
                            <h4 class="nomargin"style="text-align: center;color: white"><b>Login</b></h4>
{{--                            <p class="mt5 mb20" style="color: white">Login to access your account.</p>--}}
                            @if(Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="text-align: center;">{{ Session::get('message') }}</p>
                            @endif
                            <label class="control-label" style="color: white">User ID</label>
                            <input type="tel" id="tel" placeholder="Phone Number" class="form-control" name= "phone_no">

                            <label class="control-label" style="color: white">Password</label>
                            <input name= "password" type="password" id="password" placeholder="Password" class="form-control">

                            <a href="#"><small>Forgot Your Password?</small></a>
                            <button class="btn btn-success btn-block">Submit</button>

                        </form>

                        <div class="mb20"></div>
{{--                        <strong style="color: white" >Not a Member? <a href="/signup" style="color: white">Register Here</a></strong>--}}
                         <strong> <a href="/signup" style="color: red"> Create an Account</a> </strong>
                    </div><!-- signin0-info -->

                </div><!-- col-sm-7 -->

            </div><!-- row -->

            </div><!-- signin -->

        </section>
    </main>
    <!-- end  main content -->
@endsection
