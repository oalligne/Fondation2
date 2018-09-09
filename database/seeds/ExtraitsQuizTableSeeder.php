<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ExtraitsQuizTableSeeder extends Seeder {

    private function randDate()
	{
		return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
	}

	public function run()
	{
		DB::table('quiz_extrait')->delete();

		for($i = 0; $i < 100; ++$i)
		{
			$date = $this->randDate();
			DB::table('quiz_extrait')->insert([				
				'quiz_id' => rand(1, 25),
				'extrait_id' => rand(1, 100),
				'created_at' => $date,
				'updated_at' => $date
			]);
		}
	}
}