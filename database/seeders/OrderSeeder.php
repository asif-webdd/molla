<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 50) as $item) {
            Order::create([
                'customer_id' => rand(1, 50),
                'shipping_id' => rand(1, 50),
                'amount' => rand(99, 499),
                'order_status' => order_status(true)
            ]);
        }
    }
}
