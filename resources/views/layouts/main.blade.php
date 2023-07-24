<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link href="{{asset('css/style.css')}}" rel="stylesheet" />

	<title>Dashboard</title>
</head>
<body>

	<!-- SIDEBAR -->
	@include('includes.sidebar')
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">

		<!-- NAVBAR -->
		@include('includes.navbar')
		<!-- NAVBAR -->

		<!-- MAIN -->
		@yield('content')
		<!-- MAIN -->

	</section>
	<!-- CONTENT -->

	<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
