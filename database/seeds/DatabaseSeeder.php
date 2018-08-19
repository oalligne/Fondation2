<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(TypesQuizTableSeeder::class);
        $this->call(QuizzesTableSeeder::class);        
        $this->call(CompositeursTableSeeder::class);
        $this->call(MorceauxTableSeeder::class);
        $this->call(ExtraitsTableSeeder::class);
        $this->call(ExtraitsQuizTableSeeder::class);
        $this->call(StylesTableSeeder::class);        
        $this->call(StylesCompositeurTableSeeder::class);
    }
}
