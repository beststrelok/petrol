@section ('left_sidebar')
	<div class="admin_sidebar_container">
		<div class="sidebar_fix">
			<a href="{{l('admin')}}" class="@if (r() == 'admin') active_my @endif admin_sidebar_button"><i class="fa fa-wrench"></i>Панель управления</a>
			<a href="{{l('add_estate')}}" class="@if (r() == 'add_estate' || r() == 'change_estate') active_my @endif admin_sidebar_button"><i class="fa fa-home"></i>Добавить объект</a>
			<a href="{{l('admin_estates')}}" class="@if (r() == 'admin_estates') active_my @endif admin_sidebar_button"><i class="fa fa-list"></i>Все объекты</a>
			<a href="{{l('add_article')}}" class="@if (r() == 'add_article' || r() == 'change_article') active_my @endif admin_sidebar_button"><i class="fa fa-bullhorn"></i>Добавить новость</a>
			<a href="{{l('admin_articles')}}" class="@if (r() == 'admin_articles') active_my @endif admin_sidebar_button"><i class="fa fa-list-alt"></i>Новости</a>
			<a href="{{l('admin_towns')}}" class="@if (r() == 'admin_towns') active_my @endif admin_sidebar_button"><i class="fa fa-book"></i>Список городов</a>
			<a href="{{l('admin_districts')}}" class="@if (r() == 'admin_districts') active_my @endif admin_sidebar_button"><i class="fa fa-sitemap"></i>Список районов</a>
		</div>
		{{-- <a href="/admin" class="@if ($env == 'panel') active_my @endif admin_sidebar_button"><i class="fa fa-wrench"></i>Панель управления</a>
		<a href="/admin/change_item" class="@if ($env == 'change_item') active_my @endif admin_sidebar_button"><i class="fa fa-cart-plus"></i>Добавить товар</a>
		<a href="/admin/change_article" class="@if ($env == 'change_article') active_my @endif admin_sidebar_button"><i class="fa fa-bullhorn"></i>Добавить новость</a>
		<a href="/admin/subcats" class="@if ($env == 'subcats') active_my @endif admin_sidebar_button"><i class="fa fa-sitemap"></i>Подкатегории</a>
		<a href="/admin/catalog" class="@if ($env == 'catalog_admin') active_my @endif admin_sidebar_button"><i class="fa fa-book"></i>Каталог</a>
		<a href="/admin/articles" class="@if ($env == 'articles') active_my @endif admin_sidebar_button"><i class="fa fa-list-alt"></i>Новости</a>
		<a href="/admin/producers" class="@if ($env == 'producers') active_my @endif admin_sidebar_button"><i class="fa fa-users"></i>Производители</a>  ENV IF STATEMENT EXAMPLE--}}
	</div>
@stop