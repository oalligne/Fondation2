<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TypesQuizTableSeeder extends Seeder {

    private function randDate()
	{
		return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
	}

	public function run()
	{
		DB::table('typesquiz')->delete();

		for($i = 0; $i < 5; ++$i)
		{
			$date = $this->randDate();
			DB::table('typesquiz')->insert([
				'code' => 'Code ' . $i,
				'created_at' => $date,
				'updated_at' => $date
			]);
		}
	}
}