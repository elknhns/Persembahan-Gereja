<?php

use App\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OfferingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        
        for ($i=0; $i < 100; $i++) { 
            $id = rand(1,50);
            $person = Person::find($id);
            do {
                $value = rand(1000, 10000000);
            } while ($value % 1000 !== 0);
            DB::table('offerings')->insert([        
                'person_id' => $id,
                'code' => $person->code.str_pad($i+1, 4, '0', STR_PAD_LEFT),
                'value' => $value,
                'created_at' => $faker->dateTime()
            ]);
        }
    }
}
