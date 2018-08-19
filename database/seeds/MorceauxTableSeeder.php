<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MorceauxTableSeeder extends Seeder {

    private function randDate()
	{
		return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
	}

	public function run()
	{
		DB::table('morceaux')->delete();

		for($i = 0; $i < 50; ++$i)
		{
			$date = $this->randDate();
			DB::table('morceaux')->insert([
				'nom' => 'Nom de morceau ' . $i,
				'date_creation' => $date,
				'compositeur_id' => rand(1,10),
				'created_at' => $date,
				'updated_at' => $date
			]);
		}
	}
}