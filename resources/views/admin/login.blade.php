@extends('layouts/admin_layout')

@section('header')
	@include('partials/flash_messages')
	<div class='login_section'>
		{{ Form::open(['url' => l('logging')]) }}
			{{ HTML::image('img/layout/warning.png', 'Объект под охраной', array('class'=>'admin_warning')) }}
			<h2 class='admin_area'>Объект под охраной</h2>
			{{ Form::text('name', null, ['class'=>'form-control admin_input admin_login', 'placeholder'=>'Логин']) }}
			{{ Form::password('password', ['class'=>'form-control admin_input admin_login', 'placeholder'=>'Пароль']) }}
			{{ Form::submit('Войти', ['class'=>'form-control login_button_1']) }} 
		{{ Form::close() }}
	</div>
@stop