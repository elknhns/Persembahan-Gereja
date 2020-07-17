<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 50; $i++) { 
            $name = $faker->name;
            DB::table('people')->insert([
                'name' => $name,
                'address' => $faker->address,
                'area_id' => rand(1, 10),
                'code' => str_pad(substr(str_replace(' ', '', strtoupper($name)), 0, 9), 9, '0').str_pad($i+1, 4, '0', STR_PAD_LEFT)
            ]);
        }
    }
}
