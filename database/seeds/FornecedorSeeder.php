<?php

use Illuminate\Database\Seeder;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fornecedors')->truncate();
        factory(\App\Fornecedor::class, 10)->create();
    }
}
