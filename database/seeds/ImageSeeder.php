<?php 

use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder {
	public function run() {
		$faker = Faker::create();
		$count = 50;
		$ids = Estate::lists('estate_id');

		$images = read_dir(dir_path('estates'));
		$images = array_values(array_diff($images, ['alien.png']));

		for ($i=0; $i<$count; $i++) {
			Image::create([
				'image' 		=> $images[$i],
				'estate_id' 	=> $faker->randomElement($ids),
				'preview' 		=> $faker->boolean(30),
			]);
		}
	}
}

/*------------------------------------------------
| GENERATE 50 IAMGES
------------------------------------------------*/
// for ($i=0; $i<50; $i++) {
// 	$faker->image(dir_path('estates'));
// }
/*----------------------------------------------*/