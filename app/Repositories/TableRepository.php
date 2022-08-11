<?php

namespace App\Repositories;

use App\Models\Admin\Table;
use App\Repositories\Contracts\TableRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TableRepository implements TableRepositoryInterface
{
   protected $table;

   public function __construct()
   {
      $this->table = 'tables';
   }

   public function getTablesByTenantUuid(string $uuid)
   {
      return DB::table($this->table)
                     ->join('tenants', 'tenants.id', '=', 'tables.tenant_id')
                     ->where('tenants.uuid', $uuid)
                     ->select('tables.*')
                     ->paginate();
   }

   public function getTablesByTenantId(int $idTenant)
   {
      return DB::table($this->table)
                     ->where('tenant_id', $idTenant)
                     ->paginate();
   }

   public function getTableByIdentify(string $identify)
   {
      return DB::table($this->table)
                     ->where('identify', $identify)
                     ->first();
   }
}
