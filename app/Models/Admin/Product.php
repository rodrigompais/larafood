<?php

namespace App\Models\Admin;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use TenantTrait;

    protected $fillable = ['title','flag','price','description', 'image'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
