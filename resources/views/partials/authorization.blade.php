@section('authorization')
	<div class="header_auth">
		@if (Auth::user()->check())
			<p class="user_email">Вы вошли как: </p>
			<p class="user_email">{{ Auth::user()->get()->email }}</p>
			{{ Form::open(['url'=>'/user_logout', 'method'=>'POST', 'class'=>'']) }}
				{{ Form::submit('Выход', ['class'=>'btn exit_btn']) }}
			{{ Form::close() }}
		@else 
			<div class="" role="group" aria-label="reg">
				<button type="button" class="btn auth_btn" id="login_modal">Войти</button>
				<a href="/registration" class="btn auth_btn">Регистрация</a>
			</div>
			<div class="login" id="login_content">
				{{ Form::open(['url'=>'/user_login', 'method'=>'POST', 'class'=>'login_form']) }}
					<div>
						{{ Form::label('email', 'E-mail', ['class'=>'login_label']) }}
						{{ Form::email('email', null, ['required', 'placeholder'=>"Введите e-mail", 'class'=>'form-control']) }}
					</div>
					<div>
						{{ Form::label('password', 'Пароль', ['class'=>'login_label']) }}
						{{ Form::password('password', ['required', 'placeholder'=>"Введите пароль", 'class'=>'form-control']) }}
					</div>
					{{ Form::submit('Войти', ['class'=>'btn submit_btn']) }}
				{{ Form::close() }}
			</div>	
		@endif
	</div>	
@stop