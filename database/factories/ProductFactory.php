<?php

namespace Database\Factories\Models\Admin;

use App\Models\Admin\Product;
use App\Models\Admin\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tenant_id' => factory(Tenant::class),
            'title' => $this->faker->unique()->name,
            'description' => $this->faker->sentence,
            'image' => 'pizza.png',
            'price' => 12,9,
        ];
    }
}
