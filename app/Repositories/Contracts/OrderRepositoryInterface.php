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
        string $comment = '',
        $clientId = '',
        $tableId = ''
    );

    public function getOrderByIdentify(string $identify);
    public function registerProductsOrder(int $orderId, array $products);
    public function getOrdersByClientId(int $idClient);
}