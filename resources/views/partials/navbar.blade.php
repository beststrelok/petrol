@section('navbar')
{{-- UNKOMMENT FOR A SIMPLE STATIC NAVBAR insert name of navbar link into if statement class="@if ($env == 'name') active @end if --}}
<nav class="navbar navbar-default">
	<ul class="nav navbar-nav">
		<li class="@if (r() == 'estates' || r() == 'estate') active @endif"><a href="/">поиск объектов</a></li>
		<li class="@if (r() == 'articles' || r() == 'article') active @endif"><a href="/articles">новости</a></li>
		<li class="@if (r() == 'how_to') active @endif"><a href="/how_to">как арендовать</a></li>
		<li class="@if (r() == 'rent_sale') active @endif"><a href="/rent_sale">сдать/продать</a></li>
		<li class="@if (r() == 'selected') active @endif"><a href="/selected">избранные</a></li>
		<li class="@if (r() == 'contacts') active @endif"><a href="/contacts">контакты</a></li>
	</ul>
</nav>
@stop