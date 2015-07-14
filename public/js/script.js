// SEND CONTACT FORM
$('.js_send_contact_form').on('click', function(evt) {
	evt.preventDefault();
		$form = $(this).closest('form');
		$form.trigger('submit');
	});
// Modal for contact form
new jBox('Modal', {
    width: 560,
    height: 400,
    attach: $('#js_contact_btn'),
    content: $('#contact_form')
});


if ('estates'==ROUTE || 'admin_estates'==ROUTE) {
	/*------------------------------------------------
	| TOWNS
	------------------------------------------------*/
	on_change_towns();
	$('.js_select_town').on('change', on_change_towns);

	function on_change_towns() {
		var current = $('.js_select_town').val();
		if ('' == current) {
			$('.district').slideUp();
			return false;
		};
		$('.district').slideDown();
		var districts = $.grep(TOWNS, function (index) {
			return index.town_id == current;
		});
		if (districts[0] !== undefined) {
			districts = districts[0].districts;
		}
		var $options = [];
		$options.push($("<option value=''>Любой район</option>"));

		for (i = 0; i<districts.length; i++) {
			$options.push($("<option value="+districts[i].district_id+">"+districts[i].district+"</option>"));
		};
		$('.js_select_district').html($options);
	}

	/*------------------------------------------------
	| RUN FILTERS
	------------------------------------------------*/
	$('.js_filter_change').on('change', touch_filter); 
	$('.js_filter_click').on('click', filter_click_callback);

	function filter_click_callback() {
		$('.js_filter_click').removeClass('active');
		$(this).addClass('active');
		touch_filter();
	}
	
	function touch_filter() {
		var filters = collect_filters();
		filter(filters);
	};

	function collect_filters() {
		var $filters = $('.js_filters');

		var commercial 		= $filters.find('.js_commercial.active').data('commercial');
		var type 			= $filters.find('.js_select_type').val();
		var town_id 		= $filters.find('.js_select_town').val();
		var district_id 	= $filters.find('.js_select_district').val();
		var period 			= $filters.find('.js_select_period').val();
		var house_area_from = $filters.find('.js_range_house_area_from').val();
		var house_area_to 	= $filters.find('.js_range_house_area_to').val();
		var yard_area_from 	= $filters.find('.js_range_yard_area_from').val();
		var yard_area_to 	= $filters.find('.js_range_yard_area_to').val();
		var price_from 		= $filters.find('.js_range_price_from').val();
		var price_to 		= $filters.find('.js_range_price_to').val();
		var rooms_from 		= $filters.find('.js_range_rooms_from').val();
		var rooms_to 		= $filters.find('.js_range_rooms_to').val();
		var sea_dist_from 	= $filters.find('.js_range_sea_dist_from').val();
		var sea_dist_to 	= $filters.find('.js_range_sea_dist_to').val();

		commercial			= check_empty(commercial);
		type				= check_empty(type);
		town_id				= check_empty(town_id);
		district_id			= check_empty(district_id);
		period				= check_empty(period);
		house_area_from		= check_empty(house_area_from);
		house_area_to		= check_empty(house_area_to);
		yard_area_from		= check_empty(yard_area_from);
		yard_area_to		= check_empty(yard_area_to);
		price_from			= check_empty(price_from);
		price_to			= check_empty(price_to);
		rooms_from			= check_empty(rooms_from);
		rooms_to			= check_empty(rooms_to);
		sea_dist_from		= check_empty(sea_dist_from);
		sea_dist_to			= check_empty(sea_dist_to);

		var filters =	'commercial='	+commercial+
						'&type='		+type+
						'&town_id='		+town_id+
						'&district_id='	+district_id+
						'&period='		+period+
						'&house_area='	+house_area_from+';'+house_area_to+
						'&yard_area='	+yard_area_from+';'+yard_area_to+
						'&price='		+price_from+';'+price_to+
						'&rooms='		+rooms_from+';'+rooms_to+
						'&sea_dist='	+sea_dist_from+';'+sea_dist_to;
		return filters;
	}

	function filter(filters) {
		var url = URL_AJAX_ESTATES+'/'+filters+'?take=10&page=1&sort=title&order=asc';
		ajax('GET', url, {}, filter_callback);
	}

	function filter_callback(data) {
		estates_processing(data);
		listen_favorites();
	}

	function estates_processing(data) {
		var estate_html = '';
		var $catalog_blocks = $('.catalog_blocks');
		$catalog_blocks.html('');

		for (var i = 0; i < data.length; i++) {
			var estate = data[i];
			var src = URL_IMG+'/'+estate.image;
			var	href = URL_ESTATE+'/'+translit(estate.title)+'/'+estate.estate_id;
			estate_html += '<div class="one_item" data-id="'+estate.estate_id+'"> <div class="img">';
			
			if (estate.image !== undefined) {
				estate_html += 	'<a href="'+href+'"> \
								<img src = "'+src+'" alt="'+estate.title+'", class="item_img"> \
							</a>';
			}
			else  {
				estate_html += 	'<a href="'+href+'"> \
								<img src="img/photos/estates/alien.png" alt="'+estate.title+'", class="item_img"> \
							</a>';
			};

			estate_html += '<div class="add_to js_select"> <a> Добавить в избранные <i class="fa fa-heart-o fa-2x"></i></a></div><div class="added_to js_select"><a>Удалить из избранного<i class="fa fa-heart fa-2x"></i></a></div></div><div class="short_title"><h2 class="item_title"><a href="'+href+'">'+estate.title+'</a></h2></div><div class="short_descr"><div class="item_descr"><table><tbody> <tr> \ <td>Площадь</td> \ <td>'+estate.house_area+' м<sup>2</sup></td> \ </tr> \ <tr> \ <td>Площадь участка</td> \ <td>'+estate.yard_area+' соток</td> \ </tr> \ <tr> \ <td>Количество комнат</td> \ <td>'+estate.rooms+'</td> \ </tr> \ <tr> \ <td>Удаленность от моря</td> \ <td>'+estate.sea_dist+' м.</td> \ </tr>\ <tr>\ <td>Стоимость</td>\ <td>'+estate.price+' рублей</td>\ </tr>\ </tbody>           \ </table> \ </div> \ <div class="item_descr full"> \ <table> \ <tbody> \ <tr> \ <td>Площадь</td> \ <td>'+estate.house_area+' м<sup>2</sup></td> \ </tr> \ <tr> \ <td>Площадь участка</td> \ <td>'+estate.yard_area+' соток</td> \ </tr> \ <tr> \ <td>Количество комнат</td> \ <td>'+estate.rooms+'</td> \ </tr> \ <tr> \ <td>Удаленность от моря</td> \ <td>'+estate.sea_dist+' м.</td> \ </tr> \ <tr> \ <td>Стоимость</td> \ <td>'+estate.price+' рублей</td> \ </tr> \ <tr> \ <td>Тип аренды</td> \ <td>'+estate.period+'</td> \ </tr> \ <tr> \ <td>Адрес</td> \ <td>'+estate.address+'</td> \ </tr> \ </tbody> \ </table> \ <a class="btn more_btn" href="'+href+'">Подробнее</a> \ </div>	 \ </div> \ <a class="btn more_btn" href="'+href+'">Подробнее</a> \ </div>';
			$catalog_blocks.html(estate_html);

			var dep = ['house_area', 'yard_area', 'rooms', 'price', 'adress', 'sea_dist', 'period' ];

			for (var j = 0; j < dep.length; j++) {
				var elem = dep[j];
				if (estate[elem] == null) {
					$('.dep_'+elem).parent().hide();
				};
			}
		};
	}
// =======
// // TEMPLATE
// // var	filters = '';
// function filter(filters) {
// 	$.ajax({
// 		url: URL_AJAX_ESTATES+'/'+filters+'?take=10&page=1&sort=title&order=asc',
// 		type: 'GET',
// 		dataType: "json",
// 		// data: {
// 		// 	'category' : category
// 		// }, 
// 		success: function(data) {
// 			estates_processing(data);
// 			// reset_extremes(data);
// 		},
// 		error: function(data, error, error_details){
// 			console.log("err:", error, error_details);
// 			console.log(data);
// 			console.log(data.responseText);
// 		}
// 	});
// };

// function estates_processing (data) {
// 	var estate_html = '';
// 	var $catalog_blocks = $('.catalog_blocks');
// 	$catalog_blocks.html('');

// 	for (var i = 0; i < data.length; i++) {
// 		var estate = data[i];
// 		var src = URL_IMG+'/'+estate.image;
// 		var	href = URL_ESTATE+'/'+translit(estate.title)+'/'+estate.estate_id;
// 		estate_html += '<div class="one_item"> <div class="img">';
		
// 		if (estate.image !== undefined) {
// 			estate_html += 	'<a href="'+href+'"> \
// 							<img src = "'+src+'" alt="'+estate.title+'", class="item_img"> \
// 						</a>';
// 		}
// 		else  {
// 			estate_html += 	'<a href="'+href+'"> \
// 							<img src="img/photos/estates/alien.png" alt="'+estate.title+'", class="item_img"> \
// 						</a>';
// 		};
// 			estate_html += '<div class="add_to"><a> Добавить в избранные <i class="fa fa-heart-o fa-2x"></i></a></div><div class="added_to"><a>Удалить из избранного<i class="fa fa-heart fa-2x"></i></a></div></div><div class="short_title"><h2 class="item_title"><a href="'+href+'">'+estate.title+'</a></h2></div><div class="short_descr"><div class="item_descr"><table><tbody> <tr> \ <td>Площадь</td> \ <td class="dep_house_area">'+estate.house_area+' м<sup>2</sup></td> \ </tr> \ <tr> \ <td>Площадь участка</td> \ <td class="dep_yard_area">'+estate.yard_area+' соток</td> \ </tr> \ <tr> \ <td>Коллическтво комнат</td> \ <td class="dep_rooms">'+estate.rooms+'</td> \ </tr> \ <tr> \ <td>Удаленность от моря</td> \ <td class="dep_sea_dist">'+estate.sea_dist+' м.</td> \ </tr>\ <tr>\ <td>Стоимость</td>\ <td class="dep_price">'+estate.price+' рублей</td>\ </tr>\ </tbody>           \ </table> \ </div> \ <div class="item_descr full"> \ <table> \ <tbody> \ <tr> \ <td>Площадь</td> \ <td class="dep_house_area">'+estate.house_area+' м<sup>2</sup></td> \ </tr> \ <tr> \ <td>Площадь участка</td> \ <td class="dep_yard_area">'+estate.yard_area+' соток</td> \ </tr> \ <tr> \ <td>Коллическтво комнат</td> \ <td class="dep_rooms">'+estate.rooms+'</td> \ </tr> \ <tr> \ <td>Удаленность от моря</td> \ <td class="dep_sea_dist">'+estate.sea_dist+' м.</td> \ </tr> \ <tr> \ <td>Стоимость</td> \ <td class="dep_price">'+estate.price+' рублей</td> \ </tr> \ <tr> \ <td>Тип аренды</td> \ <td class="dep_period">'+estate.period+'</td> \ </tr> \ <tr> \ <td>Адрес</td> \ <td class="dep_address">'+estate.address+'</td> \ </tr> \ </tbody> \ </table> \ <a class="btn more_btn" href="'+href+'">Подробнее</a> \ </div>	 \ </div> \ <a class="btn more_btn" href="'+href+'">Подробнее</a> \ </div>';
// 			$catalog_blocks.html(estate_html);

// 			var dep = ['house_area', 'yard_area', 'rooms', 'price', 'adress', 'sea_dist', 'period' ];
// 			// 	'house_area'	: '<td class="dep_house_area">'+estate.house_area+' м<sup>2</sup></td>',
// 			// 	'yard_area'		: '<td class="dep_yard_area">'+estate.yard_area+' соток</td>',
// 			// 	'rooms'			: '<td class="dep_rooms">'+estate.rooms+'</td>',
// 			// 	'price'			: '<td class="dep_price">'+estate.price+' рублей</td>',
// 			// 	'adress'		: '<td class="dep_address">'+estate.address+'</td> ',
// 			// 	'sea_dist'		: '<td class="dep_sea_dist">'+estate.sea_dist+' м.</td>',
// 			// 	'period'		: '<td class="dep_period">'+estate.period+'</td>'
// 			// };

// 			for (var j = 0; j < dep.length; j++) {
// 				var elem = dep[j];
// 				// if (estate.elem) {
// 				// }
// 				if (estate[elem] == null) {
// 					$('.dep_'+elem).parent();
// 					// console.log($('.dep_'+elem).closest('tr'));
// 				};
// 			};

// 	};
// }
// >>>>>>> 9b3a1c066cf281876754f40eb9f9711fe5c42562

	function listen_favorites() {
		$('.js_select').on('click', function() {
			var estate_id = $(this).closest('.one_item').data('id');
			var url = URL_AJAX_SELECT+'/'+estate_id;
			ajax('POST', url, {}, function(){
				$(this).parent().find('.js_select').show();
				$(this).hide();
			});
		});
	}
/*----------------------------------------------*/

	/*------------------------------------------------
	| FILTER DEPENDENCIES + DRAW and RUN RANGES
	------------------------------------------------*/
	var ranges = [];

	var $yard_area_parent 	= $('.yard_area').parent();
	var $house_area_parent 	= $('.house_area').parent();
	var $rooms_parent 		= $('.rooms').parent();
	var $period_parent 		= $('.period').parent();

	var $yard_area 		= $('.yard_area').detach();
	var $house_area 	= $('.house_area');
	var $rooms 			= $('.rooms');
	var $period 		= $('.period').detach();

	var $price 			= $('.price');
	var $sea_dist 		= $('.sea_dist');

	ranges.push('house_area', 'price', 'rooms', 'sea_dist');
	initialize_ranges(ranges);

	$('.js_commercial').on('click', function () {
		var commercial = $('.js_commercial.active').data('commercial');

		if ('rent' == commercial) {
			$period_parent.append($period);
			$('.period').slideDown();
			$('.type').css({
				'float' : 'left',
				'margin-right' : '0'
			});
			$('.select_type').css('margin-left', '20px');
		} else if ('sale' == commercial) {
			if ($('.period').length) {
				$period = $('.period').detach();
			}
			$('.type').css({
				'float' : 'right',
				'margin-right' : '181px'
			});
			$('.select_type').css('margin-left', '65px');
		}

		draw_ranges($.unique(ranges));
	});

	$('.js_select_type').on('change', function () {
		var type = $('.js_select_type').val();

		if ('flat' == type || 'cottage' == type || 'commercial' == type) {
			ranges.push('house_area');
			ranges.push('rooms');
		} else if ('parcel' == type) {
			$house_area = $('.house_area').detach();
			$rooms 		= $('.rooms').detach();
			ranges = pop_by_value(ranges, 'house_area');
			ranges = pop_by_value(ranges, 'rooms');
		}

		if ('parcel' == type || 'cottage' == type || 'commercial' == type) {
			ranges.push('yard_area');
		} else if ('flat' == type) {
			$yard_area = $('.yard_area').detach();
			ranges = pop_by_value(ranges, 'yard_area');
		}

		draw_ranges($.unique(ranges));
	})

	function draw_ranges(ranges) {
		$('.first_line').html('');
		$('.second_line').html('');

		for (var i=0; i<ranges.length; i++) {
			range = ranges[i];
			$range = window['$'+range];
			if (i<3) {
				$('.first_line').append($range);
			} else {
				$('.second_line').append($range);
			}
		}

		initialize_ranges(ranges);
	}

	function initialize_ranges(ranges) {
		for (var i=0; i<ranges.length; i++) {
			var range = ranges[i];
			var $range = window['$'+range];

			$("."+range+"_slider").noUiSlider({
				start: [
					EXTREMES[range+'_min'],
					EXTREMES[range+'_max']
				],
				connect: true,
				orientation: "horizontal",
				range: {
					"min": parseInt(EXTREMES[range+'_min']),
					"max": parseInt(EXTREMES[range+'_max'])
				},
				format: wNumb({
					decimals: 0
				})
			}, true);
			$("."+range+"_slider").Link("lower").to($("#"+range+"_from"));
			$("."+range+"_slider").Link("upper").to($("#"+range+"_to"));
		}

		$('.js_filter_change').on('change', touch_filter);
	}
}	
/*------------------------------------------------
| END FILTERS DEPENDENCIES
------------------------------------------------*/






/*------------------------------------------------
| HELPERS
------------------------------------------------*/
function check_empty(element) {
	return element = element ? element : '';
}

function pop_by_value(array, value) {
	var index = array.indexOf(value);
	if (index > -1) {
		array.splice(index, 1);
	}
	return array;
}

function ajax(type, url, data, callback) {
	$.ajax({
		url: url,
		type: type,
		dataType: "json",
		data: data,
		success: callback,
		error: function(data, error, error_details){
			console.log("err:", error, error_details);
			console.log(data);
			console.log(data.responseText);
		}
	});
}
/*------------------------------------------------
| END HELPERS
------------------------------------------------*/

/*------------------------------------------------
| MAPS
------------------------------------------------*/
$('.js_open_map').on('click', function(){
	if ($('.js_map_canvas').css('display') == 'none') {
		$('.js_map_canvas').slideDown(700);
	}
	else{
		$('.js_map_canvas').slideUp(700);
	};
});
