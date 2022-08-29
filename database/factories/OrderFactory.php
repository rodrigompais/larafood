<?php

namespace Database\Factories\Models\Admin;

use App\Models\Admin\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tenant_id' => factory(Tenant::class),
            'identify' => uniqid() . Str::random(10),
            'total' => 80.0,
            'status' => 'open',
        ];
    }
}
