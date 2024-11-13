<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variant>
 */
class VariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'cost' => $this->faker->randomFloat(2, 1, 100),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'old_price' => $this->faker->randomFloat(2, 1, 100),
            'policies' => [
                'backorder' => $this->faker->boolean,
                'requires_shipping' => $this->faker->boolean,
                'pickup' => $this->faker->boolean,
                'dine_in' => $this->faker->boolean,
            ],
            'visibility' => ['web','mobile'],
            'barcode' => $this->faker->ean13,
            'sku' => $this->faker->uuid,
            'specifications' => [
                'color' => $this->faker->colorName,
                'size' => $this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
                'weight' => $this->faker->randomFloat(2, 1, 100),
                'dimensions' => [
                    'width' => $this->faker->randomFloat(2, 1, 100),
                    'height' => $this->faker->randomFloat(2, 1, 100),
                    'depth' => $this->faker->randomFloat(2, 1, 100),
                ],
            ],
        ];
    }
}
