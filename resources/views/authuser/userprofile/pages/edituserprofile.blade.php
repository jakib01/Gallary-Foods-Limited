@extends('authuser.userprofile.layout.master')
@section('content')
    <main class="main-container">
        <h1 style="text-align: center; margin-top: 10px" ><b>Update Profile</b></h1>
        @if(Session::has('message'))
             <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="text-align: center;">{{ Session::get('message') }}</p>
        @endif
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xs-4" style="border-style: solid;padding:0px;">--}}
{{--                    <img src="https://www.flaticon.com/svg/static/icons/svg/21/21104.svg" style="width:128px;height:128px;margin-left:0px" alt="User Image">--}}
{{--                </div>--}}
{{--                <div class="col-xs-8" style="border-style: solid;">--}}
{{--                    <ul style="list-style-type:none;padding:0px;">--}}
{{--                        <li>Name: {{ $data ->first_name}} {{ $data ->last_name}}</li>--}}
{{--                        <li>ID: CID{{ $data ->id}}</li>--}}
{{--                        <li>Mobile no: {{ $data ->phone_no}}</li>--}}
{{--                        <li>Rank: ---</li>--}}
{{--                        <li>Join Date: {{\Carbon\Carbon::parse($data->created_at)->format('d M Y')}}</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="container"style="border-style: solid;padding:0px;">
            <form enctype="multipart/form-data" action="updateuser" method="POST" action="Login">
            @csrf
                    

                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Phone number</h4>
                        </div>
                        <div class="col-xs-6">
                            <input type="phoneNumber" name="phone_no" value="<?php echo $data->phone_no ?>" id="phoneNumber" readonly="readonly" placeholder="EX- 01*********" class="form-control" pattern="[0-9]{11}" autofocus>
                        </div>
                    </div>
                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Email</h4>
                        </div>
                        <div class="col-xs-6">
                            <input type="email" name="email" value="<?php echo $data->email ?>" id="email" placeholder="Email" class="form-control" autofocus>
                        </div>
                    </div>
                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Date of Birth</h4>
                        </div>
                        <div class="col-xs-6">
                            <input type="date" class="form-control chosen-select" id="dateofbirth" value="<?php echo $data->date_of_birth ?>" name="date_of_birth">
                        </div>
                    </div>

                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Gender</h4>
                        </div>
                        <div class="col-xs-6">
                            <select name="gender" value="<?php echo $data->gender ?>" class="form-control chosen-select" id="gender" data-placeholder="Gender">
                                <option value="Select">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Shipping Address</h4>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" name="shipping_address" value="<?php echo $data->shipping_address ?>" id="shippingAddress" placeholder="EX- house:5; road:10; mohammadia Housing society; Mohammadpur,Dhaka" class="form-control" autofocus>
                        </div>
                    </div>

                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Father's Name</h4>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" name="father_name" value="<?php echo $data->father_name ?>" id="fatherName" placeholder="Father's Name" class="form-control" autofocus>
                        </div>
                    </div>

                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Mother's Name</h4>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" name="mother_name" id="motherName" value="<?php echo $data->mother_name ?>" placeholder="Mother's Name" class="form-control" autofocus>
                        </div>
                    </div>


                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Country</h4>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" name="country" id="country" value="<?php echo $data->country ?>" placeholder="Country" class="form-control" autofocus>
                        </div>
                    </div>

                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Division</h4>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" name="division" id="division" placeholder="Division" class="form-control" autofocus>
                        </div>
                    </div>

                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>District</h4>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" name="district" id="district" placeholder="District" class="form-control" autofocus>
                        </div>
                    </div>

                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Upazila</h4>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" name="upazila" id="upazila" placeholder="Upazila" class="form-control" autofocus>
                        </div>
                    </div>

                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Street Address/village</h4>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" name="street_address" value="<?php echo $data->street_address ?>" id="streetAddress" placeholder="Street Address/village" class="form-control" autofocus>
                        </div>
                    </div>

                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Post Code</h4>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" name="post_code" id="postCode" value="<?php echo $data->post_code ?>" placeholder="Post Code" class="form-control" autofocus>
                        </div>
                    </div>


                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Occupation</h4>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" name="occupation" value="<?php echo $data->occupation ?>" id="occupation" placeholder="Occupation " class="form-control" autofocus>
                        </div>
                    </div>

                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Nominee Name</h4>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" name="nominee_name" value="<?php echo $data->nominee_name ?>" id="nomineeName" placeholder="Nominee Name " class="form-control" autofocus>
                        </div>
                    </div>

                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Nominee Relation</h4>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" name="nominee_relation" id="nomineeRelation" value="<?php echo $data->nominee_relation ?>" placeholder="Nominee Relation" class="form-control" autofocus>
                        </div>
                    </div>

                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Nominee Address</h4>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" name="nominee_address" id="nomineeAddress" value="<?php echo $data->nominee_address ?>" placeholder="EX- house:5; road:10; mohammadia Housing society; Mohammadpur,Dhaka" class="form-control" autofocus>
                        </div>
                    </div>

                    <div class="row" style="padding:10px 20px 0px 20px">
                        <div class="col-xs-6">
                            <h4>Upload Picture</h4>
                        </div>
                        <div class="col-xs-6">
                            <div class="row">
                                <div class="col-xs-6">
                                    <!--<input type="file" name="filename" id="myFile"  class="form-control">-->
                                    <input data-preview="#preview" name="input_img" type="file" id="input_img">
                                    <img class="col-sm-6" id="preview"  src="">
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <br/>
                    <button type="submit" id= "submit" class="btn btn-success btn-block">Submit</button>
                    <br/>
            </form>
        </div>

    </main>
    <!-- end main content -->

@endsection

