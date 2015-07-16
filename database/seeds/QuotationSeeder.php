<?php 

use Illuminate\Database\Seeder;

class QuotationSeeder extends Seeder {
	public function run() {
		$faker = Faker::create();
		$count = 100;

		$region_ids = Region::lists('region_id');
		
		foreach (range(1, $count) as $i) {
			Quotation::create([
				'A76_80' 		=> $faker->randomFloat(6, $min = 19, $max = 24),
				'A92' 			=> $faker->randomFloat(6, $min = 19, $max = 24),
				'A95'	 		=> $faker->randomFloat(6, $min = 19, $max = 24),
				'region_id' 	=> $faker->randomElement($region_ids),
				'added_on'		=> Carbon::instance($faker->dateTimeBetween('10.07.2015', '16.07.2015'))->toDateString(),
			]);
		}
	}
}