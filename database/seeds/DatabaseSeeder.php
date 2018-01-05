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
        // $this->call(UsersTableSeeder::class);
        $this->call([
            AsesoresSeeder::class, 
            ServiciosSeeder::class,
            EmpresasSeeder::class,
            UserTableSeeder::class
        ]);
    }
}
