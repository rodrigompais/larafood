<?php

namespace App\Observers;

use App\Models\Admin\Tenant;
use Illuminate\Support\Str;

class TenantObserver
{
    /**
     * Handle the tenant "creating" event.
     *
     * @param  \App\Models\Admin\Tenant  $tenant
     * @return void
     */
    public function creating(Tenant $tenant)
    {
        $tenant->uuid = Str::uuid();
        $tenant->url = Str::slug($tenant->name);
    }

    /**
     * Handle the tenant "updating" event.
     *
     * @param  \App\Models\Admin\Tenant  $tenant
     * @return void
     */
    public function updating(Tenant $tenant)
    {
        $tenant->url = Str::slug($tenant->name);
    }


}
