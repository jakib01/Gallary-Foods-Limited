<form class="form-inline" action="{{ route('carts.store') }}" method="post">
    @csrf
{{--    <input type="hidden" name="product_id" value="{{ $product->id }}">--}}
{{--    <button type="button" onclick="addToCart({{ $product->id }})"><a class="btn btn-secondary btn-block" href="#">Add To Cart</a></button>--}}
{{--    <button type="submit" ><a class="btn btn-secondary btn-block" href="#">Add To Cart</a></button>--}}
    <input type="hidden" name="product_id" value="{{ $category->id }}">
    <a class="btn btn-secondary btn-block" href="#"> <button type="submit" >Add To Cart</button> </a>
</form>
