<?php 

use Illuminate\Database\Seeder;

class PetrolSeeder extends Seeder {
	public function run() {
		$data = [
			['petrol_title'=> 'A76/80'],
			['petrol_title'=> 'A92'],
			['petrol_title'=> 'A95'],
		];
		
		Petrol::insert($data);
	}
}