<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductProperty;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory()
            ->count(5)
            ->create()
            ->each(function ($product) {
                ProductProperty::factory()
                    ->count(3)
                    ->create(['product_id' => $product->id]);
            });
    }
}
