<?php

// php artisan make:controller MainController
// php artisan make:controller QuotationController
// php artisan make:controller PetrolController
// php artisan make:controller RegionController

// php artisan make:model Quotation
// php artisan make:model Petrol
// php artisan make:model Region

// php artisan migrate:install
// models extends BaseModel
// create Facades for Models

// 'Image'		=> 'App\Image',
// 'Item'		=> 'App\Item',
// 'Article'	=> 'App\Article',
// 'New'		=> 'App\New',
// 'Producer'	=> 'App\Producer',
// 'Order'		=> 'App\Order',
// 'Unit'		=> 'App\Unit',
// 'Feedback'	=> 'App\Feedback',
// 'User'		=> 'App\User',
// 'Kind'		=> 'App\Kind',
// 'Filter'	=> 'App\Filter',

// app()->make('App\Http\Controllers\FilterController');

	function v() {
		$route_views = [
			// ITEMS
			'add_item'		=> 'admin/add_item',
			'create_item'	=> null,
			'admin_items'	=> 'admin/items',
			'ajax_items'	=> null,
			'items'			=> 'items',
			'item'			=> 'item',
			'chnage_item' 	=> 'admin/change_item',
			'update_item' 	=> null,
			'delete_item' 	=> null,

			// ARTICLES
			'add_article'		=> 'admin/add_article',
			'create_article'	=> null,
			'admin_articles'	=> 'admin/articles',
			'articles'			=> 'articles',
			'article'			=> 'article',
			'chnage_article' 	=> 'admin/change_article',
			'update_article' 	=> null,
			'delete_article' 	=> null,

			// NEWS
			'add_new'		=> 'admin/add_new',
			'create_new'	=> null,
			'admin_news'	=> 'admin/news',
			'news'			=> 'news',
			'new'			=> 'new',
			'chnage_new' 	=> 'admin/change_new',
			'update_new' 	=> null,
			'delete_new' 	=> null,

			// PRODUCERS
			'create_producer'	=> null,
			'admin_producers'	=> 'admin/producers',
			'update_producer' 	=> null,
			'delete_producer' 	=> null,

			// ORDERS
			'admin_orders'	=> 'admin/orders',
			'delete_order' 	=> null,
			'order'			=> null,

			// UNITS
			'create_unit'	=> null,
			'admin_units'	=> 'admin/units',
			'update_unit' 	=> null,
			'delete_unit' 	=> null,

			// FEEDBACKS
			'admin_feedbacks'	=> 'admin/feedbacks',
			'delete_feedback' 	=> null,
			'feedback'			=> null,

			// KINDS
			'create_kind'	=> null,
			'admin_kinds'	=> 'admin/kinds',
			'update_kind' 	=> null,
			'delete_kind' 	=> null,

			// FILTERS
			'create_kind'	=> null,
			'admin_kinds'	=> 'admin/kinds',
			'update_kind' 	=> null,
			'delete_kind' 	=> null,

			// USERS
			'admin_users'	=> 'admin_users',
			'logging'		=> null,
			'logout'		=> null,
			'cabinet'		=> 'cabinet',
			'forgot_pass'	=> null,
			'register_page' => 'register_page',
			'registration'	=> null,

			// STATIC PAGES
			'delivery'		=> 'delivery',				
			'about'			=> 'about',	
			'contacts'		=> 'contacts',	
			'order_page'	=> 'order_page',

			// INTERACTIONS
			'admin'			=> 'admin/admin',
			'admin_catalog' => 'admin/admin_catalog',
			'admin_login'	=> 'admin/admin_login',
			'admin_logging'	=> null,
			'admin_logout'	=> null,
			'search'		=> 'items',
		];

		return view($route_views[Route::currentRouteName()]);
	}

	function l($route_name, $params=[]) {
		return URL::route($route_name, $params);
	}

	function r() {
		return Route::currentRouteName();
	}

	function min_round($number, $dozens=2, $divide=1) {
		if (0 == $divide) {
			throw new Exception("Division by zero!");
		}

		$number = round($number/pow(10, $dozens))*pow(10, $dozens);
		return $number/$divide;
	}

	function make_options($array, $key, $value) {
		$options = [];

		foreach ($array as $element) {
			$options[$element->$key] = $element->$value;
		}
		return $options;
	}

	function log_sql($switch="on") {
		if ('off' == $switch) {
			DB::listen(function($sql) { return null; });
			return 'Sql logging is OFF. BUT CURRENTLY NOT WORKING!';
		} else {
			DB::listen(function($sql) { var_dump($sql); });
			return 'Sql logging is ON.';
		}
	}

	function dir_path($path='root') {
		if ('layout' == $path) {
			return public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'layout';
		} elseif ('carousel' == $path) {
			return public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'carousel';
		} elseif ('articles' == $path) {
			return public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'photos'.DIRECTORY_SEPARATOR.'articles';
		} elseif ('estates' == $path) {
			return public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'photos'.DIRECTORY_SEPARATOR.'estates';
		} else {
			return public_path();
		}
	}

	function url_path($path='root') {
		if ('layout' == $path) {
			return asset('img/layout');
		} elseif ('carousel' == $path) {
			return asset('img/carousel');
		} elseif ('articles' == $path) {
			return asset('img/photos/articles');
		} elseif ('estates' == $path) {
			return asset('img/photos/estates');
		} else {
			return asset('');
		}
	}

	function dir_sep() {
		return DIRECTORY_SEPARATOR;
	}

	function read_dir($dir='D:\\EasyPHP-DevServer-14.1VC11\\data\\localweb\\projects\\villa\\public\\img\\photos') { 
		$result = []; 

		if (!file_exists($dir)) {
			echo "<span style='color: red'>ERROR: no \"$dir\" directory found!</span></br>";
			return;
		}

		$files = scandir($dir); 
		foreach ($files as $key => $value) { 
			if (!in_array($value, array(".",".."))) { 
				if (is_dir($dir.DIRECTORY_SEPARATOR.$value)) { 
					$result[$value] = read_dir($dir.DIRECTORY_SEPARATOR.$value); 
				} else {
					$result[] = iconv('Windows-1251', "UTF-8", $value);
				} 
			} 
		}

		return $result; 
	}

	function columnize($array, $columns, $current) {
		$current--; // set indexes from 1
		$array = method_exists($array, 'all') ? $array->all() : $array;
		$count = count($array);
		$rest = $count % $columns;
		$base = ($count - $rest)/$columns;
		$borders = [];

		for ($i=0; $i<$columns; $i++) {
			if ($i > 0) {
				$borders[$i] = $base + $borders[$i-1];
			} else {
				$borders[$i] = $base;
			}
			if ($rest > 0) {
				$borders[$i]++;
				$rest--;
			}
		}

		if ($current > 0) {
			$start = $borders[$current-1];
			$length = $borders[$current]-$borders[$current-1];
		} else {
			$start = 0;
			$length = $borders[$current];
		}

		return array_slice($array, $start, $length);
	}

	function s($str, $options = array()) {
		// URL SLUG https://gist.github.com/sgmurphy/3098978
		// Make sure string is in UTF-8 and strip invalid UTF-8 characters
		$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
		
		$defaults = array(
			'delimiter' => '_',
			'limit' => null,
			'lowercase' => true,
			'replacements' => array(
				'/\?/i' => '\_',
				'/\//i' => '\_',
				'/\^/i' => '\_',
			),
			'transliterate' => true,
		);

		// Merge options
		$options = array_merge($defaults, $options);
		
		$char_map = array(
			// Latin
			'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C', 
			'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 
			'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O', 
			'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH', 
			'ß' => 'ss', 
			'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c', 
			'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 
			'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o', 
			'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th', 
			'ÿ' => 'y',

			// Latin symbols
			'©' => '(c)',

			// Greek
			'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
			'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
			'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
			'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
			'Ϋ' => 'Y',
			'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
			'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
			'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
			'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
			'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',

			// Turkish
			'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
			'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g', 

			// Russian
			'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
			'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
			'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
			'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
			'Я' => 'Ya',
			'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
			'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
			'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
			'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
			'я' => 'ya',

			// Ukrainian
			'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
			'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',

			// Czech
			'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U', 
			'Ž' => 'Z', 
			'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
			'ž' => 'z', 

			// Polish
			'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z', 
			'Ż' => 'Z', 
			'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
			'ż' => 'z',

			// Latvian
			'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N', 
			'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
			'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
			'š' => 's', 'ū' => 'u', 'ž' => 'z'
		);
		
		// Make custom replacements
		$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
		
		// Transliterate characters to ASCII
		if ($options['transliterate']) {
			$str = str_replace(array_keys($char_map), $char_map, $str);
		}
		
		// Replace non-alphanumeric characters with our delimiter
		$str = preg_replace('/[^\p{L}\p{Nd}^\/]+/u', $options['delimiter'], $str);
		
		// Remove duplicate delimiters
		$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
		
		// Truncate slug to max. characters
		$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
		
		// Remove delimiter from ends
		$str = trim($str, $options['delimiter']);
		
		return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
	}

/*------------------------------------------------
| FILTERS
------------------------------------------------*/
	function apply_filters(Illuminate\Database\Eloquent\Builder $query, $filters='') {
		parse_str($filters, $filters);

		foreach ($filters as $filter => $value) {
			if (''==$value or ';'==$value or '[]'==$value) {
				continue;
			}

			//resetting dependencies
			// if ('type'==$filter or 'commercial'==$filter) {
			// 	$filters = reset_dependencies($filters);
			// }

			$type = detect_filter_type($value);
			
			if ('check'==$type) {
				$query->where($filter, 1);
			} else if ('list'==$type) {
				$list = trim($value, '[]');
				$items = explode(';', $list);
				$query->whereIn($filter, $items);
			} else if ('range'==$type) {
				$range = explode(';', $value);
				$query->where($filter, '>=', $range[0])->where($filter, '<=', $range[1]);
			} else if ('type'==$type) {	
				/*------------------------------------------------
				| JOIN DEPENDENCIES
				------------------------------------------------*/
				if ('town_id'==$filter) {
					$filter = 'towns.town_id';
				}
				if ('district_id'==$filter) {
					$filter = 'districts.district_id';
				}
				/*----------------------------------------------*/

				$query->where($filter, $value);
			}
		}

		return $query;
	}

	function reset_dependencies($filters) {
		if (!in_array($filters['type'], ['flat', 'cottage', 'commercial'])) {
			unset($filters['house_area']);
			unset($filters['rooms']);
		}
		if (!in_array($filters['type'], ['cottage', 'parcel', 'commercial'])) {
			unset($filters['yard_area']);
		}
		if (!in_array($filters['commercial'], ['rent'])) {
			unset($filters['period']);
		}

		return $filters;
	}

	function detect_filter_type($value) {
		if ('bool'==$value) {
			return 'check';
		} else if ('['==$value[0]) {
			return 'list';
		} else if (strpos($value, ';')) {
			return 'range';
		} else {
			return 'type';
		}
	}

	function get_filter_type($filter) {
		$filter_types = [
			'type'			=> 'type', 	// ['flat', 'cottage', 'parcel', 'commercial']
			'commercial'	=> 'type', 	// ['rent', 'sale']
			'sea_dist'		=> 'range',
			'price'			=> 'range',
			'district_id'	=> 'type', 	// ['1', '2', '3']
			'town_id'		=> 'type', 	// ['1', '2', '3']
			'house_area'	=> 'range', // if (in_array($type, ['flat', 'cottage', 'commercial']))
			'rooms'			=> 'range', // if (in_array($type, ['flat', 'cottage', 'commercial']))
			'yard_area'		=> 'range', // if (in_array($type, ['cottage', 'parcel', 'commercial']))
			'period'		=> 'type',  // if (in_array($commercial, ['rent'])) ['hourly', 'daily', 'monthly']
			'pool'			=> 'check', 
			'producer'		=> 'list',  // '[asus;acer;lenovo;toshiba;sony]'
		];
		return $filter_types[$filter];
	}