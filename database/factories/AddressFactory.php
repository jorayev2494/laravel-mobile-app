<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->title,
            "city" => $this->faker->city,
            "address_street" => $this->faker->streetName,
            "address_lane" => $this->faker->streetSuffix,
            "postal_code" => $this->faker->numberBetween(1111, 9999),
            "phone_number" => $this->faker->e164PhoneNumber,
        ];
    }
}
