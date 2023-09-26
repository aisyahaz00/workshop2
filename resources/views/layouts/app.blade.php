<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.meta')
    <title>Document</title>
</head>
<body>
    @include('includes.nav')
    <main>
        @yield('content')
    </main>
    @include('includes.footer')
    @include('includes.script')
</body>
</html>