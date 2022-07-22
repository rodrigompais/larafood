<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name','description'];

    public function profiles()
    {
        $this->belongsToMany(Profile::class);
    }
}
