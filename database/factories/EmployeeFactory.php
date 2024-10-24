<?php

namespace Database\Factories;

use App\Models\EmployeePosition;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $positions = EmployeePosition::all();
        if ($positions->count() === 0){
            $position = EmployeePositionFactory::new();
        }else{
            $position = $positions->random()->id;
        }
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'employee_position_id' => $position,
        ];
    }
}
