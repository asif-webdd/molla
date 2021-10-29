<?php

namespace Database\Seeders;

use App\Models\Customers;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customers::create([
            'name' => 'Asif Ahmed',
            'email' => 'abc@gmail.com',
            'mobile' => '01789522092',
            'password' => Hash::make('123456'),
            'address' => 'Bosila, Mohammadpur, Dhaka',
            'email_verified' => 1
        ]);

        $faker = Factory::create();

        foreach (range(0, 50) as $item) {
            Customers::create([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'mobile' => '01' . $this->rand_number() . rand(00000000, 99999999),
                'password' => Hash::make('123456'),
                'address' => $faker->address
            ]);
        }
    }


    private function rand_number()
    {
        return array_rand([1, 2, 3, 5, 6, 7, 8, 9]);
    }
}
