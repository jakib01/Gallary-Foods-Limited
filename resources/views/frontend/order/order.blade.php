@extends('frontend.order.layout.master')

@section('content')

    <div class="container" style="padding-bottom: 40px">
        @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="text-align: center;">{{ Session::get('success') }}</p>
        @endif

        <section class="ld-cart-section ptb-50">
            <h2><b>Confirm Items</b></h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Begin table -->
                        <table class="table cart-table">
                            <thead>
                            <tr>
                                <th class="table-title">Serial No.</th>
                                <th class="table-title">Product Name</th>
{{--                                                <th class="table-title">Product Code</th>--}}
                                <th class="table-title">Unit Price</th>
                                <th class="table-title">Quantity</th>
{{--                                                <th class="table-title">Unit </th>--}}
                                <th class="table-title">SubTotal</th>
                                <th><span class="close-button disabled"></span></th>
                            </tr>
                            </thead>

                            <tbody>
                                <?php
                                $total_price = 0;
                                $cart = 0;
                                ?>
                                @foreach (App\Models\cart::totalCarts() as $cart)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td class="product-name-col">
                                            <figure>
    {{--                                                            <a href="#"><img class="img-responsive" src="img/product/product-minimal-8.jpg" alt="White linen sheer dress"></a>--}}
                                                <a href="{{ route('carts.details') }}"><img src="{{ asset('/img/product/productlist/'.$cart->product->image) }}" height="210px" width="290px"></a>
                                            </figure>
                                            <h2 class="product-name"><a href="{{ route('carts.details') }}">{{ $cart->product->title }}</a></h2>
                                            <ul>
                                                <li>Color: White</li>
                                                <li>Size: SM</li>
                                            </ul>
                                        </td>
    {{--                                                    <td class="product-code">MP125984154</td>--}}
                                        <td class="product-price-col">
                                            <span class="product-price-special">৳{{ $cart->product->price }}</span>
                                        </td>

                                        <td class="custom-quantity-input">
                                            <h2>{{ $cart->product_quantity }}</h2>
                                        </td>

                                        <td class="product-total-col">
                                            <?php
                                                $total=0; $subtotal =  $cart->product->price * $cart->product_quantity;
                                            ?>
                                            <span class="product-price-special">৳{{ $subtotal}}</span>
                                        </td>

                                    </tr> <!-- End tr -->
                                @endforeach
                            </tbody>
                        </table>      <!-- End table -->

                        <div class="container-fluid" style="background-color:  #1faabe">
                            <?php
                            $total_price = 0;
                            $cart = 0;
                            ?>
                            @foreach (App\Models\cart::totalCarts() as $cart)
                                <?php
                                $total_price += $cart->product->price * $cart->product_quantity;
                                ?>
                            @endforeach

                            <?php
                                $shipping_cost = App\Models\Settings::first()->shipping_cost;
                                $total_price_with_shipping_cost = $total_price + $shipping_cost;
                            ?>
                                <h4 style="text-align: right">Total Price: <strong>৳{{ $total_price }}</strong></h4><br>
                                <h4 style="text-align: right">Shipping Cost: <strong>৳{{ $shipping_cost }}</strong></h4><br>
                                <h4 style="text-align: right">Total Price +(Shipping Cost): <strong>৳{{ $total_price_with_shipping_cost }}</strong></h4><br>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <div class="card card-body mt-2 mb-4">
            <h2><b>Shipping Addresss</b></h2>

                    <form method="POST" action="{{ route('orders.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Reciever Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ session()->has('user') ? session('user').' '.session('last_name') : '' }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ session()->has('user') ? session('email') : '' }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">Phone No</label>
                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ session()->has('user') ? session('phone_no') : '' }}" required>
                                @if ($errors->has('phone_no'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('phone_no') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">Additional Message (optional)</label>
                            <div class="col-md-6">
                                <textarea id="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" rows="4" name="message"></textarea>
                                @if ($errors->has('message'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('message') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shipping_address" class="col-md-4 col-form-label text-md-right">Shipping Address (*)</label>
                            <div class="col-md-6">
                                <textarea id="shipping_address" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" rows="4" name="shipping_address" required>{{ session()->has('user') ? session('shipping_address') : '' }}</textarea>
                                @if ($errors->has('shipping_address'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('shipping_address') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shipping_address" class="col-md-4 col-form-label text-md-right">Total Price</label>
                            <div class="col-md-6">
                                <P><input type="text" id="total_price" name="total_price" value="{{session()->has('user')? $total_price: ''}}" readonly> Taka</P>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shipping_address" class="col-md-4 col-form-label text-md-right">Total Price with shipping cost</label>
                            <div class="col-md-6">
                                <p><input type="text" id="total_price_with_shipping_cost" name="total_price_with_shipping_cost" value="{{session()->has('user')? $total_price_with_shipping_cost: ''}}" readonly>Taka</p>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="payment_method" class="col-md-4 col-form-label text-md-right">Select a payment method</label>
                            <div class="col-md-6">

                                <select class="form-control" name="payment_method_id" required id="payments">
                                    <option value="">Select a payment method please</option>
                                    @foreach ($payments as $payment)
                                        <option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                                    @endforeach
                                </select>

                                @foreach ($payments as $payment)
                                    @if ($payment->short_name == "cash_in")
                                        <div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden">
                                            <h3>
                                                For Cash in there is nothing necessary. Just click Finish Order.
                                                <br>
                                                <small>
                                                    You will get your product in two or three business days.
                                                </small>
                                            </h3>
                                        </div>
                                    @else
                                        <div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden">
                                            <h3>{{ $payment->name }} Payment</h3>
                                            <p>
                                                <strong>{{ $payment->name }} No :  {{ $payment->no }}</strong>
                                                <br>
                                                <strong>Account Type: {{ $payment->type }}</strong>
                                            </p>
                                            <div class="alert alert-success">
                                                Please send the above money to this Bkash No and write your transaction code below there..
                                            </div>
                                        </div>
                            @endif
                            @endforeach
                            <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter transaction code">
                        </div>
                    </div>

{{--                <div class="form-group row mb-0">--}}
{{--                    <div class="col-md-6 offset-md-4">--}}
                        <h4 style="text-align: center"><button type="submit" onclick="location.href = '/';" class="btn btn-primary">Order Now</button></h4>
{{--                    </div>--}}
{{--                </div>--}}
{{--    </div>--}}
            </form>
        </div> {{-- payment col end--}}

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#payments").change(function(){
            $payment_method = $("#payments").val();
            if ($payment_method == "cash_in") {
                $("#payment_cash_in").removeClass('hidden');
                $("#payment_bkash").addClass('hidden');
                $("#payment_rocket").addClass('hidden');
            }else if ($payment_method == "bkash") {
                $("#payment_bkash").removeClass('hidden');
                $("#payment_cash_in").addClass('hidden');
                $("#payment_rocket").addClass('hidden');
                $("#transaction_id").removeClass('hidden');
            }else if ($payment_method == "rocket") {
                $("#payment_rocket").removeClass('hidden');
                $("#payment_bkash").addClass('hidden');
                $("#payment_cash_in").addClass('hidden');
                $("#transaction_id").removeClass('hidden');
            }
        })
    </script>
@endsection
