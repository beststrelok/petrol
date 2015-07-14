@section('header')
	<header>
		<div class="container_header">
			<div class="logo">
				<a href="/">
					{{HTML::image('img/layout/logo.png', 'krim villa logo')}}
				</a>
			</div>
			<div class="descript">
				<p>Недвижимость</p>
				<p>для комфортной жизни</p>
			</div>
			<div class="contacts">
				<p>
					<i class="fa fa-phone fa-2x"></i>
				</p>
				<p>+7 (812) 954-11-09 <br />
					+7 (921) 954-11-09
				</p>
			</div>
			<div class="socials">
				<a href="#" class="fs">
					<i class="fa fa-facebook-square fa-3x"></i>
				</a>
				<a href="#" class="tw">
					<i class="fa fa-twitter-square fa-3x"></i>
				</a>
				<a href="#" class="gpl">
					<i class="fa fa-google-plus-square fa-3x"></i>
				</a>
				<i class="fa fa-heart fa-3x"></i>
				<div class="counter">
					<p>10 объектов</p>
					<span>в</span>
					{{HTML::link('/selected/', 'избранных')}}
				</div>
			</div>
		</div>
		<div class="container_navbar">
			@yield('navbar')
		</div>	
	</header>
@stop
