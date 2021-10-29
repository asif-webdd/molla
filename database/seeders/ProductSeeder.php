<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach (range(0, 100) as $item) {
            $name = substr($faker->paragraph, 0, 35);
            Product::create([
                "brand_id" => rand(1, 11),
                "category_id" => rand(1, 50),
                "create_by" => 1,
                "name" => $name,
                "slug" => slugify($name),
                "price" => rand(299, 499),
                "offer_price" => rand(99, 289),
                "offer_date_start" => date('Y-m-d'),
                "offer_date_end" => date('Y-m-d'),
                "thumbnail" => $faker->imageUrl,
                "gallery" => json_encode([$faker->imageUrl, $faker->imageUrl]),
                "quantity" => rand(10, 50),
                "sku_code" => $item . date('Ymd'),
                "featured" => 'no',
                "description" => $faker->realText(400),
                "status" => 'active',
            ]);
        }
    }
}
