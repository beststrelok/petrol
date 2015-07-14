<div class="form_block_small_on_page">
	<h3>Написать нам</h3>
	<hr class="form_hr">
	<div class="form">
		{{ Form::open(['url'=>'/feedback', 'method'=>'POST', 'class'=>'contact_form']) }}
			<div class="inner_form_block">
				<div class="name">
					{{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Имя:'])}}
					<i class="fa fa-chevron-right"></i>
				</div>
				<div class="phone">
					{{ Form::text('phone', null, ['class'=>'form-control', 'placeholder'=>'Телефон:'])}}
					<i class="fa fa-chevron-right"></i>
				</div>
				<div class="email">
					{{ Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email:'])}}
					<i class="fa fa-chevron-right"></i>
				</div>
				<div class="text_message">
					{{ Form::textarea('text_message', null, ['class'=>'form-control', 'placeholder'=>'Сообщение'])}}
					<i class="fa fa-chevron-right"></i>
				</div>
				<div class="send btn js_send_contact_form">
					<i class="fa fa-envelope-o fa-lg"></i>
				</div>
			</div>
			{{ Form::submit('Отправить', ['class'=>'btn contact_form_submit']) }} 
		{{ Form::close() }}
	</div>
</div>	