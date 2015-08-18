<?php

use Illuminate\Database\Seeder;

class InsuggTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('insugg')->delete();
        for($i=0;$i<100;$i++){
            \App\Insugg::create([
                'insuggtitle' => $faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ",
                'insuggcontent' => $faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ".$faker->word." ",
                'requestip' => $faker->word,
                'userid' => 1
            ]);
        }
    }
}
