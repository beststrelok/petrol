<div class="filters_full">
	<div class="filters js_filters">
		<h3>поиск объекта</h3>
			<div class="selects">
				<div class="btn-group">
					<button class='btn btn-default active js_filter_click buttons js_commercial' data-commercial='sale'>Купить</button>
					<button class='btn btn-default js_filter_click buttons js_commercial' data-commercial='rent'>Арендовать</button>
				</div>
				<div class="city_and_district">
					<div class="city">
						{{ Form::label('city', 'Выберите город', ['class'=>'filters_label']) }}
						{{ Form::select('city', array_replace([''=>'Любой город'], make_options($towns, 'town_id', 'town')), null, ['class'=>'js_filter_change form-control select_place select_city js_select_town', 'required', 'form'=>'other']) }}
					</div>
					<div class="district">
						{{ Form::label('district', 'Выберите район', ['class'=>'filters_label']) }}
						{{ Form::select('district', [] , null, ['class'=>'js_filter_change form-control select_place select_district js_select_district', 'form'=>'other']) }}	
					</div>
				</div>
				<div class="type_and_period">
					<div class="type">
						{{ Form::label('type', 'Выберите тип', ['class'=>'filters_label']) }}
						{{ Form::select('type', ['flat'=>'Квартира', 'cottage'=>'Коттедж', 'parcel'=> 'Земельный участок', 'commercial'=>'Коммерческая' ], null, ['class'=>'js_filter_change form-control select_type js_select_type', 'required', 'form'=>'other']) }}
					</div>
					<div class="period">
						{{ Form::label('period', 'Выберите период', ['class'=>'filters_label']) }}
						{{ Form::select('period', ['hourly'=>'Почасово', 'daily'=>'По дням', 'monthly'=> 'По месяцам'], null, ['class'=>'js_filter_change form-control select_period js_select_period', 'required', 'form'=>'other']) }}
					</div>
				</div>
			</div>
			<div class="draggers">
				<div class="first_line">
					<div class="price">
						<p class="filter_heading">Цена:</p>
						{{ Form::label('price_from', 'от', ['class'=>'filters_label']) }}
						{{ Form::text('price_from', null, ['class'=>'form-control js_range_price_from', 'id'=>'price_from', 'form'=>'other'])}}
						{{ Form::label('price_to', 'до', ['class'=>'filters_label']) }}
						{{ Form::text('price_to', null, ['class'=>'form-control js_range_price_to', 'id'=>'price_to', 'form'=>'other'])}}
						<span>рублей</span>
						<div class="price_slider js_filter_change"></div>
					</div>
					<div class="sea_dist">
						<p class="filter_heading">Удаленность от моря:</p>
						{{ Form::label('sea_dist_from', 'от', ['class'=>'filters_label']) }}
						{{ Form::text('sea_dist_from', null, ['class'=>'form-control js_range_sea_dist_from', 'id'=>'sea_dist_from', 'form'=>'other'])}}
						{{ Form::label('sea_dist_to', 'до', ['class'=>'filters_label']) }}
						{{ Form::text('sea_dist_to', null, ['class'=>' form-control js_range_sea_dist_to', 'id'=>'sea_dist_to', 'form'=>'other'])}}
						<span>метров</span>
						<div class="sea_dist_slider js_filter_change"></div>
					</div>
					<div class="house_area">
						<p class="filter_heading">Площадь дома:</p>
						{{ Form::label('house_area_from', 'от', ['class'=>'filters_label']) }}
						{{ Form::text('house_area_from', null, ['class'=>'form-control js_range_house_area_from', 'id'=>'house_area_from', 'form'=>'other'])}}
						{{ Form::label('house_area_to', 'до', ['class'=>'filters_label']) }}
						{{ Form::text('house_area_to', null, ['class'=>' form-control js_range_house_area_to', 'id'=>'house_area_to', 'form'=>'other'])}}
						<span>м<sup>2</sup></span>
						<div class="house_area_slider js_filter_change"></div>
					</div>
				</div>
				<div class="second_line">
					<div class="yard_area">
						<p class="filter_heading">Площадь участка:</p>
						{{ Form::label('yard_area_from', 'от', ['class'=>'filters_label']) }}
						{{ Form::text('yard_area_from', null, ['class'=>' form-control js_range_yard_area_from', 'id'=>'yard_area_from', 'form'=>'other'])}}
						{{ Form::label('yard_area_to', 'до', ['class'=>'filters_label']) }}
						{{ Form::text('yard_area_to', null, ['class'=>' form-control js_range_yard_area_to', 'id'=>'yard_area_to', 'form'=>'other'])}}
						<span>соток</span>
						<div class="yard_area_slider js_filter_change"></div>
					</div>
					<div class="rooms">
						<p class="filter_heading">Количесвто комнат:</p>
						{{ Form::label('rooms_from', 'от', ['class'=>'filters_label']) }}
						{{ Form::text('rooms_from', null, ['class'=>'form-control js_range_rooms_from', 'id'=>'rooms_from', 'form'=>'other'])}}
						{{ Form::label('rooms_to', 'до', ['class'=>'filters_label']) }}
						{{ Form::text('rooms_to', null, ['class'=>'form-control js_range_rooms_to', 'id'=>'rooms_to', 'form'=>'other'])}}
						<span>комнат</span>
						<div class="rooms_slider js_filter_change"></div>
					</div>
				</div>
		</div>
	</div>
</div>	