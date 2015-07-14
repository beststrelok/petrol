@extends('/layouts/layout')
@extends('/partials/header')
@extends('/partials/navbar')
@extends('/partials/footer')

@section('body')
	<div class="article_page">
		<div class="full_green">
			<div class="article_header_content">
				<h1>новости</h1>
				<div class="heading_date">
					<p class="date">{{str_limit($article->added_on, 10, '')}}</p>
					<p class="article_main_title">{{$article->title}}</p>
				</div>
			</div>
		</div>
		<div class="article">
			{{$article->body}}
		<div class="to_all">
			<a href="{{l('articles')}}">Перейти к списку новостей <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></a>
		</div>
		</div>
	</div>
@stop