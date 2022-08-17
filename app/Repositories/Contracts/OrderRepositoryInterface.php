<?php

namespace App\Repositories\Contracts;

use Illuminate\Validation\Rules\In;

interface OrderRepositoryInterface
{
    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        int $tenantId,
        $clientId = '',
        $tableId = ''
    );

    public function getOrderByIdentify(string $identify);    
    
}