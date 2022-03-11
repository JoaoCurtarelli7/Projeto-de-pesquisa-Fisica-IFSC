<?php

use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curso')->insert(["nome" => "Informática"]);
        DB::table('curso')->insert(["nome" => "Alimentos"]);
        DB::table('curso')->insert(["nome" => "Mecânica"]);
    }
}
