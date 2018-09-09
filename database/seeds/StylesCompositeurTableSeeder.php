<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StylesCompositeurTableSeeder extends Seeder {

    private function randDate()
	{
		return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
	}

	public function run()
	{
		DB::table('compositeur_style')->delete();

		for($i = 0; $i < 5; ++$i)
		{
			$date = $this->randDate();
			DB::table('compositeur_style')->insert([
				'compositeur_id' => rand(1,10),
				'style_id' => rand(1,5),
				'created_at' => $date,
				'updated_at' => $date
			]);
		}
	}
}