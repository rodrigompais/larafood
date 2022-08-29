<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenantTest extends TestCase
{
    /**
     * Get test all Tenant.
     *
     * @return void
     */
    public function testGetAllTenants()
    {
        $response = $this->get('/api/v1/tenants');

        $response->dump();

        $response->assertStatus(200);
    }
}
