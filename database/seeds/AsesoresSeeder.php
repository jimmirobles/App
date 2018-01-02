<?php

use Illuminate\Database\Seeder;

class AsesoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asesores')->insert(array([
            'nombre' => 'Jimmi Robles',
            'email' => 'jimmi@humanbusiness.com.mx',
            'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
        ],
    [
            'nombre' => 'Hibrahim Sandy',
            'email' => 'hibrahim@humanbusiness.com.mx',
            'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
        ]));
    }
}
