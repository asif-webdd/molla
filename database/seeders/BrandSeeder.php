<?php

namespace Database\Seeders;

use App\Models\Brand;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Brand::create([
            'user_id' => 1,
            'name' => 'No Brand',
            'slug' => 'no-brand',
            'status' => 'active'
        ]);

        foreach (range(1, 10) as $index){
            $name = substr($faker->unique->text, 0, 10);
            Brand::create([
                'user_id' => rand(1, 10),
                'name' => $name,
                'slug' => slugify($name),
                'image' => $faker->imageUrl,
                'status' => 'active'
            ]);
        }
    }
}
