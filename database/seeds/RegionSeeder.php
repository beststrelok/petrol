<?php 

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder {
	public function run() {
		$data = [
			['region_title'=> 'Луганская'],
			['region_title'=> 'Донецкая'],
			['region_title'=> 'Черкасская'],
			['region_title'=> 'Кировоградская'],
			['region_title'=> 'Черниговская'],
			['region_title'=> 'Черновицкая'],
			['region_title'=> 'Винницкая'],
			['region_title'=> 'Запорожская'],
			['region_title'=> 'Хмельницкая'],
			['region_title'=> 'Ивано-Франковская'],
			['region_title'=> 'Ровенская'],
			['region_title'=> 'Николаевская'],
			['region_title'=> 'Житомирская'],
			['region_title'=> 'Тернопольская'],
			['region_title'=> 'Закарпатская'],
			['region_title'=> 'Херсонская'],
			['region_title'=> 'Волынская'],
			['region_title'=> 'Полтавская'],
			['region_title'=> 'Сумская'],
			['region_title'=> 'Киев'],
			['region_title'=> 'Днепропетровская'],
		];
	
		Region::insert($data);
	}
}