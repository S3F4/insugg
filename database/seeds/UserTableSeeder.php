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
        DB::table('users')->delete();
        User::create(array(
            'name' => 'Chris Sevilleja',
            'username' => 'sevilayha',
            'email' => 'chris@scotch.io',
            'password' => Hash::make('awesome'),
        ));
    }
}
