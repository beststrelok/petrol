<?php namespace App;

use App\BaseModel;

class Petrol extends BaseModel {
	public 	  $timestamps = false;
	protected $guarded = [];
	protected $primaryKey = 'petrol_id';
	protected $trimmed = ['title'];

	public static function boot() {
		parent::boot();

		Petrol::deleted(function($petrol) {
			$petrol->quotations()->delete();
		});
	}

	public function quotations() {
		return $this->hasMany('Quotation');
	}
}