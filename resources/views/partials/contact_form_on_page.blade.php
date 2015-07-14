<?php 
	$options = ['Сдать в аренду дом' => 'Сдать в аренду дом',
				'Сдать в аренду квартиру'=>'Сдать в аренду квартиру',
				'Сдать в аренду участок' => 'Сдать в аренду участок',
				'Сдать в аренду комменрческую недвижимость'=>'Сдать в аренду коммерческую недвижимость',
				'Продать дом' => 'Продать дом',
				'Продать квартиру' => 'Продать квартиру',
				'Продать участок' => 'Продать участок',
				'Продать коммерческую недвижимость' => 'Продать коммерческую недвижимость',
				];
 ?>
<div class="form_block_on_page">
	<h3>Подать заявку</h3>
	{{-- <i class="fa fa-times fa-lg"></i> --}}
	<div class="form">
		<hr class="form_hr">
		{{ Form::open(['url'=>'/order', 'method'=>'POST', 'class'=>'contact_form']) }}
			<div class="inner_form_block">
				<div class="select">
					{{ Form::select('activity', $options, null, ['class'=>'form-control form_select', 'placeholder'=>'выбирите действие', 'reaqired']) }}
				</div>
				<div class="phone">
					{{ Form::text('phone', null, ['class'=>'form-control form_input_small', 'placeholder'=>'Телефон:'])}}
					<i class="fa fa-chevron-right"></i>
				</div>
				<div class="email">
					{{ Form::email('email', null, ['class'=>'form-control form_input_small', 'placeholder'=>'Email:'])}}
					<i class="fa fa-chevron-right"></i>
				</div>
				<div class="name">
					{{ Form::text('name', null, ['class'=>'form-control form_input_small', 'placeholder'=>'Имя:'])}}
					<i class="fa fa-chevron-right"></i>
				</div>
				<div class="subject">
					{{ Form::text('subject', null, ['class'=>'form-control form_input_big', 'placeholder'=>'Тема'])}}
					<i class="fa fa-chevron-right"></i>
				</div>
				<div class="text_message">
					{{ Form::textarea('text_message', null, ['class'=>'form-control form_input_area', 'placeholder'=>'Сообщение'])}}
					<i class="fa fa-chevron-right"></i>
				</div>
				<div class="send btn js_send_contact_form">
					<i class="fa fa-envelope-o fa-2x"></i>
				</div>
			</div>
			{{ Form::submit('Отправить', ['class'=>'btn contact_form_submit']) }} 
		{{ Form::close() }}
	</div>
</div>	