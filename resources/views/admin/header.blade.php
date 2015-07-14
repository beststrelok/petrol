@section('header') 
	<header>
		<div class="header_top">
			<div class="admin_to_site">
				<div class="btn-group admin_header_btn_group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<a href="/" class="admin_header_link"><i class="fa fa-home"></i> Крым-Вилла</a>{{-- INSERT ROJRCT NAME HERE--}}
					</button>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="/" class="btn btn-exit btn_link">Перейти на сайт</a>
						</li>
					</ul>
				</div>	
			</div>
			<div class="admin_exit">
				<div class="btn-group admin_header_btn_group">
					<button type="button" class="btn btn-default dropdown-toggle admin_header_btn" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-user"></i>Привет, admin<!--user_name--> <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li>
							{{ Form::open(array('url' => "/admin/admin_logout", 'method' => 'POST')) }}
								{{ Form::submit('Выйти', ['class'=>'btn btn-exit']) }}
							{{ Form::close() }}
						</li>
					</ul>
				</div>	
			</div>
		</div>	
	</header>
@stop