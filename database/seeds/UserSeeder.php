<?php 

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
	public function run() {
		$faker = Faker::create();
		$count = 1;

		for ($i=0; $i<$count; $i++) {
			User::create([
				'name'		=> 'admin',
				'password'	=> '$2y$10$wQR3pm2Nqmjmic88IYo0.eVsFRg9d06.yy3s7CxoUaJaSe/uwDACa',
			]);
		}
	}
}