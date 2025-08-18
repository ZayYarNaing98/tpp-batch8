<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1,
                'name' => 'Product A',
                'description' => "This is Product A",
                'price' => 1000,
            ],
            [
                'category_id' =>2,
                'name' => 'Product B',
                'description' => "This is Product B",
                'price' => 2000,
            ],
            [
                'category_id' =>3,
                'name' => 'Product C',
                'description' => "This is Product C",
                'price' => 3000,
            ],
            [
                'category_id' =>3,
                'name' => 'Product D',
                'description' => "This is Product D",
                'price' => 4000,
            ],
        ];

        foreach($products as $product)
        {
            Product::create($product);
        }
    }
}
