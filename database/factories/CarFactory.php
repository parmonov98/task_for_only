<?php

namespace Database\Factories;

use App\Models\ComfortCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model' => $this->faker->randomElement([
                'Tesla Model S',
                'BMW 3 Series',
                'Audi A6',
                'Mercedes-Benz C-Class',
                'Ford Mustang'
            ]),
            'plate' => $this->faker->regexify('[A-Z]{2}-[0-9]{3}-[A-Z]{2}'),
            'driver_id' => DriverFactory::new(),
            'comfort_category_id' => ComfortCategory::all()->random()->id,
        ];
    }
}
