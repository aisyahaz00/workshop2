<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
    <link href="/css/login.css" rel="stylesheet">
 <!--Fontawesome CDN-->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<title>Login Page</title>
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		@yield('konten')
	</div>
</div>
@include('includes.script')
</body>
</html>