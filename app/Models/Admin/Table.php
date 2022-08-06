<?php

namespace App\Models\Admin;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use TenantTrait;
    
    protected $fillable = ['identify', 'description'];
}
