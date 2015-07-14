<?php namespace App;

use Eloquent;
use App\Presenters\PresentableTrait;
use App\Mutators\TrimmableTrait;
use App\Mutators\FlattenableTrait;

class BaseModel extends Eloquent {
	use FlattenableTrait;
	use PresentableTrait;
	use TrimmableTrait;

	protected $dates = ['added_on'];
}