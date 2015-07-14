@section ("footer")
	<div class="full_screen">
		<footer>
			<div class="logo_footer">
				<a href="/" class="logo_footer">
					{{ HTML::image("img/layout/logo_footer.png", "logo", ['class'=>'logo']) }}
				</a>	
			</div>
			<div class="footer_descript left">
				<p>Агентство недвижимости</p>
				<p>"Крым Вилла" предлагает частные</p>
				<p>дома, коттеджы и земельные участки для продажи в Крыму.</p>
			</div>
			{{-- UNKOMMENT FOR A SIMPLE NAVBAR IN FOOTER --}}
			<div class="footer_nav_block">
				<ul class="footer_nav left">
					<li class="active"><a href="/">поиск объектов</a></li>
					<li class=""><a href="/articles">новости</a></li>
					<li class=""><a href="/how_to">как арендовать</a></li>
				</ul>
				<ul class="footer_nav right">
					<li class=""><a href="/rent_sale">сдать/продать</a></li>
					<li class=""><a href="/selected">избранные</a></li>
					<li class=""><a href="/contacts">контакты</a></li>
				</ul>
			</div>
			<div class="copyright">
				<div class="client_copy">
					<p>
						<i class="fa fa-copyright"></i> 2015 Krim Villa&nbsp All rights reserved
					</p>
					{{-- <p></p> --}}
				</div>
				<div class="our_link">
					<p>made by
						<a href="http://www.dev.bzzz.biz.ua">bzzz! web development studio</a>
					</p>
				</div>
			</div>	
		</div>
	</footer>	
@stop