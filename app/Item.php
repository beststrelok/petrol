<?php namespace App;

use App\BaseModel;

class Item extends BaseModel {
	public 	  $timestamps = false;
	protected $guarded = [];
	protected $primaryKey = 'article_id';
	protected $trimmed = [];

	function scopeByKind($query, $kind_id) {
		return $query->where('kind_id', $kind_id);
	}

	public function scopeJoined($query) {
		return $query->join('kinds', 'items.kind_id', '=', 'kinds.kind_id')
					->join('units', 'units.unit_id', '=', 'item.unit_id')
					->join('producers', 'producers.producer_id', '=', 'item.producer_id')
					->join('images', 'images.item_id', '=', 'items.item_id');
	}

	function scopeSearch($query, $param) {
		$items = $query->where('item_code', $param)->get();
		if (0 == count($items)) {
			return $query->where('title', 'like', '%'.$param.'%');
		} else {
			return $query->where('item_code', $param);
		}
	}
}
