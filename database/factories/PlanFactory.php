<?php

namespace Database\Factories\Models\Admin;

use App\Models\Admin\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanFactory extends Factory
{
    protected $model = Plan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name,
            'price' => 89.00,
            'description' => $this->faker->sentence,
        ];
    }
}
