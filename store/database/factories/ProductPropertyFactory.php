<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductProperty;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPropertyFactory extends Factory
{
    protected $model = ProductProperty::class;

    public function definition(): array
    {
        $properties = ['color', 'size', 'brand'];

        return [
            'name' => $this->faker->randomElement($properties),
            'value' => $this->faker->word,
        ];
    }
}
