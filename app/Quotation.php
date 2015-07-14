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
}