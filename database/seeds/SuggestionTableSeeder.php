<?php

use Illuminate\Database\Seeder;

class SuggestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suggestion')->delete();
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++)
        {
            $user = \App\Suggestion::create(array(
                'suggestion' => $faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ",
                'userid' => 1
            ));
        }
    }
}
