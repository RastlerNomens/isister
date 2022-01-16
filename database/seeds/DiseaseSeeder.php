<?php

use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diseases')->insert([
        [
            'race' => 0,
            'name' => 'Hepatitis'
        ], [
            'race' => 0,
            'name' => 'Moquillo'
        ], [
            'race' => 0,
            'name' => 'Leptospirosis'
        ], [
            'race' => 0,
            'name' => 'Parvovirosis'
        ], [
            'race' => 0,
            'name' => 'Rabia'
        ], [
            'race' => 1,
            'name' => 'Leucemia'
        ], [
            'race' => 1,
            'name' => 'Rinotraquetis'
        ], [
            'race' => 1,
            'name' => 'Panleucopenia'
        ], [
            'race' => 1,
            'name' => 'Calicivirus'
        ], [
            'race' => 1,
            'name' => 'Rabia'
        ], [
            'race' => 2,
            'name' => 'Moquillo'
        ], [
            'race' => 3,
            'name' => 'Rabia'
        ]]);
    }
}
