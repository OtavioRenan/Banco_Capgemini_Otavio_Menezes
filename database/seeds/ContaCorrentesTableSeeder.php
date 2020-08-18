<?php

use Illuminate\Database\Seeder;
use App\Repositorio\ContaCorrente;

class ContaCorrentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ContaCorrente::class, 10)->create();
    }
}
