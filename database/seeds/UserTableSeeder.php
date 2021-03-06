<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->delete();
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++)
        {
            $user = User::create(array(
                'username' => $faker->userName,
                'useremail' => $faker->email,
                'password' => $faker->word
            ));
        }
    }
}
