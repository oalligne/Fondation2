<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ExtraitsTableSeeder extends Seeder {

    private function randDate()
	{
		return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
	}

	public function run()
	{
		DB::table('extraits')->delete();

		for($i = 0; $i < 100; ++$i)
		{
			$date = $this->randDate();
			DB::table('extraits')->insert([
				'url' => '/MonUrlExtrait/' . $i,
				'source' => 'www.masource. ' . $i .'.com',
				'debut' => rand(1, 49),
				'fin' => rand(50, 100),				
				'morceau_id' => rand(1, 50),
				'created_at' => $date,
				'updated_at' => $date
			]);
		}
	}
}