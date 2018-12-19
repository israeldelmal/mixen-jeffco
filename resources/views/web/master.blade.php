<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('meta')
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="icon" type="image/png" href="{{ asset('assets/images/icon.png') }}">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body>
	@yield('nav')
	@yield('content')
	@yield('footer')
	<!-- Botón navegación -->
	<button id="ActiveMenu">
		<span></span>
		<span></span>
		<span></span>
	</button>
	@yield('js')
</body>
</html>