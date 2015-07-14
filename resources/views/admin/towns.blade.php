@extends('layouts/admin_layout')
@extends('admin/header')
@extends('admin/sidebar')
@extends('admin/footer')
@extends('partials/flash_messages')

@section('body')
	<h1 class="admin_uni_heading">Все города</h1>
	<div class="admin_main_content">
		<div class="admin_catalog_category">
			<h4 class="admin_one_cat_heading">Города</h4>
			<a class="admin_one_town_add"><i class="fa fa-plus">&nbsp</i>Добавить город</a>
			<div class="admin_add_town_block">
				{{ Form::open(['url'=>'admin/towns/update_town/$town->town_id', 'method'=>'POST', 'class'=>'admin_add_subcategory_form input-group']) }}
					<p class="admin_add_town_title">Добавить город</p>
					<div class="change_block admin_select_title_div">
						{{ Form::label('town', 'Название', ['class'=>'admin_uni_label admin_select_title_label']) }}
						{{ Form::text('town', null, ['class'=>'form-control admin_select_title_text', 'required']) }}
					</div>
					{{ Form::submit('Добавить', ['class'=>'btn admin_add_button admin_uni_button ']) }}
				{{ Form::close() }}
			</div> <!--admin_add_subcategory_div-->
			@if (count($towns))
				<div class="admin_one_cat_subcats_block">
					<div class="admin_subcats_list">
						<ul>	
{{-- 							@foreach ($HELP::columnize($towns) as $key => $town)
								<li>
									<p class="admin_subcategory">
										{{ $subcat->subcat }}
									</p>
									<div class="subcats_btns">
										<a class="sub_btns_a"><i class="fa fa-pencil change_icon_2_{{$key}}"></i></a>
										{{ Form::open(array('url' => "/admin/delete_subcat?subcat_id=$town->towm_id", 'method' => 'POST', 'class'=>'admin_subcategory_form')) }}
											<i class="fa fa-times delete_items_group_icon del_sc_ad"></i>
										{{ Form::close() }} 
									</div>
									<div class="admin_change_subcategory_div adm_ch_ca_2_{{$key}} mfp-hide mfp-zoom-out" data-effect="mfp-zoom-out">
										{{ Form::open(['url'=>"admin/update_subcat?subcat_id=$town->town_id", 'method'=>'POST', 'class'=>'admin_add_subcategory_form input-group']) }}
											<p class="admin_add_subcategory_title">Редактирование города</p>
											<div class="change_block admin_id_subcategory_div">
												<p class="admin_uni_label admin_id_subcategory_title">ID города</p>
												<p class="admin_id_subcategory_id">{{$subcat->subcat_id}}</p>
											</div>
											<div class="change_block admin_select_title_div">
												{{ Form::label('town', 'Название', ['class'=>'admin_uni_label admin_select_title_label']) }}
												{{ Form::text('town', $town->town, ['class'=>'form-control admin_select_title_text', 'required']) }}
											</div>
											{{ Form::submit('Изменить', ['class'=>'btn admin_add_button admin_uni_button ']) }}
										{{ Form::close() }}
									</div> <!--admin_add_subcategory_div-->
								</li>
							@endforeach --}}
						</ul>	
					</div><!-- admin_subcats_list -->
				</div><!--admin_one_cat_subcats_block-->
			@endif
		</div>	
	</div>
@stop
