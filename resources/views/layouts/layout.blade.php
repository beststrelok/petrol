<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=1200'>
		<title>Petrol prices</title>
		<link rel="shortcut icon" href="{{ asset('img/layout/favicon.ico') }}">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,100,300&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>

		{{ HTML::style('css/vendor/bootstrap.min.css') }}
		{{ HTML::style('css/vendor/font-awesome.min.css') }}
		{{ HTML::style('css/vendor/jquery-ui.min.css') }}
{{-- 		{{ HTML::style('css/vendor/jquery.nouislider.min.css') }}
		{{ HTML::style('css/vendor/fotorama.css') }}
		{{ HTML::style('css/vendor/jBox/jBox.css') }} --}}

		{{ HTML::style('css/style.css') }}

		{{ HTML::script('js/vendor/jquery.min.js') }}
		{{ HTML::script('js/vendor/bootstrap.min.js') }}
		{{ HTML::script('js/vendor/jquery-ui.min.js') }}
		{{-- {{ HTML::script('js/vendor/jquery.nouislider.all.min.js') }} --}}
		{{-- {{ HTML::script('https://maps.googleapis.com/maps/api/js?v=3.exp') }} --}}
		{{-- {{ HTML::script('js/vendor/fotorama.js') }} --}}
		{{-- {{ HTML::script('js/vendor/jBox.min.js') }} --}}
		{{-- {{ HTML::script('js/vendor/translit.js') }} --}}

		@yield('css')
	</head>

	<body>
		@yield('header')
		@yield('body')
		{{-- @include('partials/contact_form') --}}
		@yield('footer')

		<script>
			@include('partials/js_globals')
			@yield('js')
		</script>

		{{ HTML::script('js/script.js') }}

	</body>
</html>