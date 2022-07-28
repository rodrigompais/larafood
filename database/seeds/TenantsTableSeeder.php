<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\{
    Plan,
    Tenant
};

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
            'cnpj' => '91913809000160',
            'name' => 'Lucca e Noah Filmagens ME',
            'url' => 'luccaenoahfilmagens',
            'email' => 'vendas@luccaenoahfilmagensme.com.br',
        ]);
    }
}
