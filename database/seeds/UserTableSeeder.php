<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array([
                    'name' => 'Jimmi Robles Casanova',
                    'email' => 'jimmi@humanbusiness.com.mx',
                    'password' => bcrypt('secret'),
                ], [
                    'name' => 'Hibrahim Arias',
                    'email' => 'hibrahim@humanbusiness.com.mx',
                    'password' => bcrypt('secret')
                ]));
    }
}
