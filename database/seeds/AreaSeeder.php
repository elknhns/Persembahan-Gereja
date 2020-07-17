<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 10; $i++) {
            $street = $faker->streetName; 
            DB::table('areas')->insert([
                'name' => $street,
                'slug' => \Str::slug($street)
            ]);
        }
    }
}
