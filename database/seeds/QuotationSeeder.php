<?php 

use Illuminate\Database\Seeder;

class QuotationSeeder extends Seeder {
	public function run() {
		$faker = Faker::create();
		$count = 50;

		$region_ids = Region::lists('region_id');
		
		foreach (range(1, $count) as $i) {
			Quotation::create([
				'price' 		=> $faker->randomFloat(6, $min = 19, $max = 24),
				'petrol' 		=> $faker->randomElement(['A76/80', 'A92', 'A95']),
				'region_id' 	=> $faker->randomElement($region_ids),
				'added_on'		=> $faker->dateTimeBetween('10.07.2015', '14.07.2015'),
			]);
		}
	}
}