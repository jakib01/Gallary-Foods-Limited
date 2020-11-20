<!DOCTYPE html>
{{--<html lang="en" dir="ltr">--}}
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>Product</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('frontend.product.partial.style')
</head>
<body class="style-14 index-3">

        @include('frontend.partial.navbar')
        @yield('content')
        @include('frontend.partial.footer')

        @include('frontend.product.partial.script')
</body>
</html>
