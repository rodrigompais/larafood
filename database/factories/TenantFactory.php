<?php

namespace Database\Factories;

use App\Models\Admin\{
    Plan,
    Tenant
};
use Illuminate\Database\Eloquent\Factories\Factory;

class TenantFactory extends Factory
{
    //protected $model = Tenant::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'plan_id' => factory(Plan::class),
            'cnpj' => uniqid() . date('YmdHis'),
            'name' => $this->faker->unique()->name,
            'email' => $this->faker->unique()->safeEmail,
            
        ];
    }
}
