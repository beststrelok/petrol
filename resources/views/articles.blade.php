@extends('/layouts/layout')
@extends('/partials/header')
@extends('/partials/navbar')
@extends('/partials/footer')

@section('body')
	<div class="full_green">
		<h1>новости</h1>
	</div>
	<div class="articles">
		@foreach($articles as $article)
			<div class="one_article">
				<div class="articles_img">
					{{-- @if ($article->preview) --}}
						{{-- <a href="{{l('article', [$article->title, $atrticle->article_id])}}"> --}}
							{{-- {{HTML::image('img/photos/articles/$article->preview', '$article->title')}} --}}
						{{-- </a> --}}
					{{-- @else	 --}}
						<a href="{{l('article', [$article->title, $article->article_id])}}">
							{{HTML::image('img/photos/articles/alien.png', '$article->title')}}
						</a>
					{{-- @endif	  --}}
				</div>
				<div class="article_text">
					<div class="article_heading">
						<a href="{{l('article', [$article->title, $article->article_id])}}" class="title_link">
							{{$article->title}}
						</a> 
						<a href="{{l('article', [$article->title, $article->article_id])}}" class="title_link full">
							{{$article->title}}
						</a> 
					</div>
					<div class="text_itself"><p>{{$article->body}}</p></div>
					<a href="{{l('article', [$article->title, $article->article_id])}}" class="more">Подробнее <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></a>
				</div>
			</div>
		@endforeach	
	</div>
@stop