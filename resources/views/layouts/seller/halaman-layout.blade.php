<!DOCTYPE html>
<html lang="en">
<head>
   @include('includes.head')
</head>
<body>
    @include('layouts.seller.navbar')

    <div>
        @yield('konten')
    </div>

    
    <div>
        @yield('keranjang')
    </div>

    <div>
        @yield('footer')
    </div>

    @include('includes.script')