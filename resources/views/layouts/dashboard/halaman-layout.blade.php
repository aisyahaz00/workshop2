<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">

            @include('layouts.dashboard.sidebar')

    <div class="col">
        @include('layouts.dashboard.navbar')
        <div class="py-3">
            @yield('konten')
        </div>
    </div>

        </div>
    </div>


    @include('includes.script')
</body>
</html>