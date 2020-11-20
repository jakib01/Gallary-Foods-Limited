@extends('frontend.cart.layout.master')
@section('content')

    <!-- start main content -->
    <main class="main-container">
        <!-- shopping cart content -->
        <section class="shopping-cart-area">
            <!-- Begin cart -->
            <div class="ld-subpage-content">

                <div class="ld-cart">

                    <!-- Begin cart section -->
                    <section class="ld-cart-section ptb-50">

                        <div class="container">

                            <div class="row">

                                <div class="col-md-12">

                                    <!-- Begin table -->
                                    <table class="table cart-table">
                                        <thead>
                                        <tr>
                                            <th class="table-title">Product No</th>
                                            <th class="table-title">Product Name</th>
                                            <th class="table-title">Product Code</th>
                                            <th class="table-title">Unit Price</th>
                                            <th class="table-title">Quantity</th>
                                            <th class="table-title">Unit </th>
                                            <th class="table-title">SubTotal</th>
                                            <th><span class="close-button disabled"></span></th>
                                        </tr>
                                        </thead>

                                        <?php
                                            $total=0;
                                            $cart= 0;
                                        ?>
                                        <tbody>

                                        @foreach($carts as $cart)
                                            <?php
                                                $subtotal= $cart->price * $cart->product_quantity;
                                                $total= $total+ $subtotal;
                                            ?>
                                        <tr>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>

                                            <td class="product-name-col">
                                                <figure>
                                                    <a href="product/{{$cart->slug}}"><img src="{{ asset('/img/product/productlist/'.$cart->image) }}" height="210px" width="290px"></a>
                                                </figure>
                                                <h2 class="product-name"><a href="product/{{$cart->slug}}">{{$cart->title}}</a></h2>
                                                <ul>
                                                @if(!empty($cart->color))
                                                    <li>Color:
                                                        <select class="dropdown-color" key="{{$cart->cid}}">
                                                        <option selected="selected">Choose one</option>
                                                        <?php
                                                        $mycolors = explode(',', $cart->color);
                                                        foreach($mycolors as $mycolor){
                                                            echo "<option value='$mycolor'>$mycolor</option>";
                                                        }
                                                        ?>
                                                        </select>
                                                    </li>
                                                    @endif
                                                    @if(!empty($cart->size))
                                                    <li>Size:
                                                        <select class="dropdown-size" key="{{$cart->cid}}">
                                                        <option selected="selected">Choose one</option>
                                                        <?php
                                                        $mysizes = explode(',', $cart->size);
                                                        foreach($mysizes as $mysize){
                                                            echo "<option value='$mysize'>$mysize</option>";
                                                        }
                                                        ?>
                                                        </select>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </td>

                                            <td class="product-code">MP125984154</td>

                                            <td class="product-price-col">
                                                <span class="product-price-special">{{$cart->price}} Taka</span>
                                                <!--<span class="product-price-special">Taka</span> -->
                                            </td>
                                            <td>
                                                <div class="custom-quantity-input" id="quantity">
                                                    <input type="text" class="quantity_class"  key="{{$cart->cid}}" value="{{$cart->product_quantity}}">
                                                    <!--<button type="submit" class="btn-maroon">Update</button>-->
                                                </div>
                                            </td>

                                            <td class="product-total-col">
                                                <?php
                                                    //$cart=0;$total_price=0 ;$total_price += $cart->category->price * $cart->product_quantity;
                                                ?>
                                                <span class="product-price-special">{{ $subtotal}} Taka</span>
                                            </td>

                                            <td>
                                                <button type="submit" key="{{$cart->cid}}" class="close_btn"><i class="fa fa-times"></i></button>
                                            </td>
                                        </tr> <!-- End tr -->
                                       @endforeach
                                        </tbody>
                                    </table>      <!-- End table -->


                                    <div class="container-fluid" style="background-color:  #1faabe">
                                        <h3 style="float:right"><strong>Total:->  </strong>{{$total}}</h3>
                                    </div>

                                    <div class="container-fluid" style="padding-top: 20px">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <a href="{{ route('home') }}" class="btn btn-custom-6 btn-lger min-width-lg">Continue Shopping</a>
                                            </div>

                                            <div class="col-md-6">
                                                @if(session()->has('user'))
                                                    <div class="text-right"><a href="{{ route('orders') }}" class="btn btn-custom-6 btn-lger min-width-sm">Checkout</a></div>
                                                @else
                                                    <div class="text-right"><a href="/login" class="btn btn-custom-6 btn-lger min-width-sm">Checkout</a></div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /.ld-cart-section -->
                </div>
                <!-- /.ld-cart -->
            </div>
            <!-- /.ld-subpage-content -->
            <!-- End Cart -->
        </section>
        <!-- end shopping cart content -->
    </main>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".quantity_class").change(function(e){
    //alert("The text has been changed.");
    var unit= $(this).val();
    var cart_id= $(this).attr("key");
    if(unit >0 && unit !=''){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "{{ url('/unitupdate') }}",
            method: 'POST',
            data: {
                cart_id: cart_id,
                unit: unit,
                "_token": "{{ csrf_token() }}"

            },
            success: function(result){
                window.location.reload();
                    //alert(result)

            }});
    }
  });
  $(".close_btn").click(function(e) {
    var cart_id= $(this).attr("key");
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "{{ url('/deletecart') }}",
            method: 'POST',
            data: {
                cart_id: cart_id,
                "_token": "{{ csrf_token() }}"
            },
            success: function(result){
                window.location.reload();
            }});
  });
  $(".dropdown-color").change(function(e){
    //alert("The text has been changed.");
    var color= $(this).val().toLowerCase();
    var cart_id= $(this).attr("key");
    if(color !='Choose one'){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "{{ url('/colorupdate') }}",
            method: 'POST',
            data: {
                cart_id: cart_id,
                color: color,
                "_token": "{{ csrf_token() }}"

            },
            success: function(result){
                //window.location.reload();
                    //alert(result)

            }});
    }
  });
  $(".dropdown-size").change(function(e){
    //alert("The text has been changed.");
    var size= $(this).val().toLowerCase();
    var cart_id= $(this).attr("key");
    if(size !='Choose one'){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "{{ url('/sizeupdate') }}",
            method: 'POST',
            data: {
                cart_id: cart_id,
                size: size,
                "_token": "{{ csrf_token() }}"

            },
            success: function(result){
                //window.location.reload();
                    //alert(result)

            }});
    }
  });
});
</script>
@endsection
