<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\{
    Plan,
    Tenant
};
use Illuminate\Support\Str;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'uuid' => Str::uuid(),
            'cnpj' => '91913809000160',
            'name' => 'Lucca e Noah Filmagens ME',
            'url' => 'luccaenoahfilmagens',
            'email' => 'vendas@luccaenoahfilmagensme.com.br',
            'subscription'  => now(),
            'expires_at'    => now()->addDays(7),
        ]);
    }
}
