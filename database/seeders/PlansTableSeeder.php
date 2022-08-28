<?php

namespace Database\Seeders;

use App\Models\Admin\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Businers',
            'url' => 'businers',
            'price' => 499.99,
            'description' => 'Plano Empresarial',
        ]);
        Plan::create([
            'name' => 'Individual',
            'url' => 'individual',
            'price' => 199.99,
            'description' => 'Plano Individual',
        ]);
        Plan::create([
            'name' => 'Free',
            'url' => 'free',
            'price' => 0.00,
            'description' => 'Plano Gratis',
        ]);
    }
}
