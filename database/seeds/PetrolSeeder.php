<?php 

use Illuminate\Database\Seeder;

class PetrolSeeder extends Seeder {
	public function run() {
		$data = [
			['title'=> 'A76/80'],
			['title'=> 'A92'],
			['title'=> 'A95'],
		];
		
		Petrol::insert($data);
	}
}