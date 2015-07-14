<?php namespace App;

use App\BaseModel;

class Quotation extends BaseModel {
	public 	  $timestamps = false;
	protected $guarded = [];
	protected $primaryKey = 'quotation_id';
	protected $trimmed = [];

	public function petrol() {
		return $this->belongsTo('Petrol');
	}	

	public function region() {
		return $this->belongsTo('Region');
	}

	public function scopeJoined($query) {
		return $query->join('regions', 'quotations.region_id', '=', 'regions.region_id')
					->join('petrols', 'quotations.petrol_id', '=', 'petrols.petrol_id');
	}
}