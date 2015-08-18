<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tag')->delete();
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++)
        {
            $user = \App\Tag::create(array(
                'tag' => $faker->word
            ));
        }
    }
}
