<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\TableResouce;
use App\Services\TableService;
use Illuminate\Http\Request;

class TableApiController extends Controller
{
    protected $tableService;

    public function __construct(TableService $tableService)
    {
        $this->tableService = $tableService;
    }

    public function tablesByTenant(TenantFormRequest $request)
    {
        // if (!$request->token_company) {
        //     return response()->json(['message' => 'Token Not Found'], 404);
        // }

        $tables = $this->tableService->getTablesByUuid($request->token_company);

        return TableResouce::collection($tables);
    }

    public function show(TenantFormRequest $request, $identify)
    {
        if (!$table = $this->tableService->getTableByUuid($identify)) {
            return response()->json(['message' => 'Table Not Found'], 404);
        }

        return new TableResouce($table);
    }
}
