<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Shipping::create([
            'name' => 'Asif Ahmed',
            'mobile' => '01789522092',
            'address' => $faker->address,
        ]);


        foreach (range(0, 50) as $item) {
            Shipping::create([
                'name' => $faker->name,
                'mobile' => '01' . $this->rand_number() . rand(00000000, 99999999),
                'address' => $faker->address,
            ]);
        }
    }


    private function rand_number()
    {
        return array_rand([1, 2, 3, 5, 6, 7, 8, 9]);
    }
}
