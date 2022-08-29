<?php

namespace Database\Factories\Models\Admin;

use App\Models\Admin\Category;
use App\Models\Admin\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tenant_id' => factory(Tenant::class),
            'name' => $this->faker->unique()->name,
            'description' => $this->faker->sentence,
        ];
    }
}
