<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\Types\This;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $price = $this->faker->numberBetween(100, 5000);
        $salePrice = $this->faker->numberBetween(50, $price);
        return [
            "title" => $this->faker->title,
            "price" => $price,
            "sale_price" => $salePrice,
            "description" => $this->faker->text,
            "rating" => random_int(0, 5),
            "is_active" => $this->faker->boolean,
        ];
    }
}
