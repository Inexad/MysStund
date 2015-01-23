<!DOCTYPE html><!-- manifest="offline.manifest" -->
<html lang="en">
	<head>
		<!-- Head info. Imports: css, js -->
		@include('_includes-home.head')
	</head>
	<body>
		<!-- Site header -->
		@include('_includes-home.header')

		<!-- Site navigation bar -->
		@include('_includes-home.navbar')
		
		<!-- Site navigation bar -->
		@yield('content')
		<hr>
		<!-- Site footer -->
		@include('_includes-home.footer')
	</body>
</html>
