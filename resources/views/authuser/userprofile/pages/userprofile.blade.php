@extends('authuser.userprofile.layout.master')
@section('content')
    <main class="main-container">
        <div class="container" >
            <h1 style="text-align: center; margin-top: 10px"><b>My Profile</b></h1>
            <div class="row">
                <div class="col-xs-4" style="border-style: solid;padding:0px;">
                @if( $data ->avatar !='' or  $data ->avatar != NULL )
                    <img src="{{ '/img/user/'.$data ->avatar}}" style="width:128px;height:128px;margin-left:0px" alt="User Image">
                @else
                    <img src="https://www.flaticon.com/svg/static/icons/svg/21/21104.svg" style="width:128px;height:128px;margin-left:0px" alt="User Image">
                @endif
                </div>
                <div class="col-xs-8" style="border-style: solid;">
                    <ul style="list-style-type:none;padding:0px;">
                      <li><b>Name :</b> {{ $data ->first_name}} {{ $data ->last_name}}</li>
                      <li><b>ID :</b> CID{{ $data ->id}}</li>
                      <li><b>Mobile no :</b> {{ $data ->phone_no}}</li>
                      <li><b>Rank :</b>---</li>
                      <li><b>Join Date :</b> {{\Carbon\Carbon::parse($data->created_at)->format('d M Y')}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container"style="border-style: solid;padding:0px;">

            <div class="row"style="padding:10px 20px 0px 20px">
                <div class="col-xs-6" >
                    <h4>Father's Name</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->father_name ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                    <h4>Mother's Name</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->mother_name ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                    <h4>Country</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->country ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                    <h4>Division</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->division_id ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                    <h4>District</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->district_id ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                    <h4>Upazila</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->upazilas_id ?? "--"}}</h4>
                </div>
            </div>

            <div class="row"style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                    <h4>Street Address/village</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->street_address ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                    <h4>Post Code</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->post_code ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                    <h4>Email</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->email ?? "--"}}</h4>
                </div>
            </div>

{{--            <div class="row" style="padding:10px 20px 0px 20px">--}}
{{--                <div class="col-xs-6">--}}
{{--                    <h4>Country code</h4>--}}
{{--                </div>--}}
{{--                <div class="col-xs-6">--}}
{{--                    <h4>{{ $data ->phone_code ?? "--"}} </h4>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                    <h4>Mobile No</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->phone_no ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                    <h4>Date of Birth</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->date_of_birth ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                    <h4>Gender</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->gender ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                    <h4>Shipping Address</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->shipping_address ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                   <h4>Occupation</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->occupation ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                   <h4>Nominee Name</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->nominee_name ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                   <h4>Nominee Relation</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->nominee_relation ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                   <h4>Nominee Address</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->nominee_address ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                   <h4>Introducer Name</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->nominee_name ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                   <h4>Introducer Id</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->nominee_name ?? "--"}}</h4>
                </div>
            </div>

            <div class="row" style="padding:10px 20px 0px 20px">
                <div class="col-xs-6">
                   <h4>Introducer Email</h4>
                </div>
                <div class="col-xs-6">
                    <h4>{{ $data ->nominee_name ?? "--"}}</h4>
                </div>
            </div>

        </div>
    </main>
    <!-- end main content -->

@endsection

