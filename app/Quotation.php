<?php namespace App;

use App\BaseModel;

class Quotation extends BaseModel {
	public 	  $timestamps = false;
	protected $guarded = [];
	protected $primaryKey = 'quotation_id';
	protected $trimmed = [];

	public function region() {
		return $this->belongsTo('Region');
	}

	public function scopeJoined($query) {
		return $query->join('regions', 'quotations.region_id', '=', 'regions.region_id');
	}
}