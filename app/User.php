<?php namespace App;

use App\BaseModel;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends BaseModel implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'users';
	protected $primaryKey = 'user_id';
	public 	  $timestamps = false;
	protected $guarded = ['admin'];
	protected $trimmed = [];
	protected $hidden = ['password', 'remember_token', 'admin']; // excluded from the model's JSON
}
