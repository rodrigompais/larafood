<?php

namespace App\Models\Admin;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{

    protected $fillable = [
        'uuid',
        'cnpj',
        'name',
        'url',
        'email',
        'logo',
        'active',
        'subscription',
        'expires_at',
        'subscription_id',
        'subscription_active',
        'subscription_suspended',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
