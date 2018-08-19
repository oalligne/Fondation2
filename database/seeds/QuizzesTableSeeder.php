<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class QuizzesTableSeeder extends Seeder {

    private function randDate()
	{
		return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
	}

	public function run()
	{
		DB::table('quizzes')->delete();

		for($i = 0; $i < 25; ++$i)
		{
			$date = $this->randDate();
			DB::table('quizzes')->insert([
				'nom' => 'Type de Quiz ' . $i,
				'difficulte' => 'Difficulte ' . $i,
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ' . $i,
				'typequiz_id' => rand(1, 5),
				'created_at' => $date,
				'updated_at' => $date
			]);
		}
	}
}