<?php namespace App;

use App\BaseModel;

class Region extends BaseModel {
	public 	  $timestamps = false;
	protected $guarded = [];
	protected $primaryKey = 'region_id';
	protected $trimmed = ['title'];

	public static function boot() {
		parent::boot();

		Region::deleted(function($region) {
			$region->quotations()->delete();
		});
	}

	public function quotations() {
		return $this->hasMany('Quotation');
	}
}