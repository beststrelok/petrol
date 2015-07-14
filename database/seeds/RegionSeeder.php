<?php 

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder {
	public function run() {
		$data = [
			['title'=> 'Луганская'],
			['title'=> 'Донецкая'],
			['title'=> 'Черкасская'],
			['title'=> 'Кировоградская'],
			['title'=> 'Черниговская'],
			['title'=> 'Черновицкая'],
			['title'=> 'Винницкая'],
			['title'=> 'Запорожская'],
			['title'=> 'Хмельницкая'],
			['title'=> 'Ивано-Франковская'],
			['title'=> 'Ровенская'],
			['title'=> 'Николаевская'],
			['title'=> 'Житомирская'],
			['title'=> 'Тернопольская'],
			['title'=> 'Закарпатская'],
			['title'=> 'Херсонская'],
			['title'=> 'Волынская'],
			['title'=> 'Полтавская'],
			['title'=> 'Сумская'],
			['title'=> 'Киев'],
			['title'=> 'Днепропетровская'],
		];
	
		Region::insert($data);
	}
}