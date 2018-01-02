<?php

use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'razon_social' 	=> 'UNIFORMA SA DE CV',
            'rfc' 			=> 'UEC010101000',
            'direccion' 	=> 'MDO 28',
            'correo'		=> 'uniforma@mail.com',
            'created_at' 	=> date('Y-m-d H:m:s'),
			'updated_at' 	=> date('Y-m-d H:m:s')
        ]);
    }
}
