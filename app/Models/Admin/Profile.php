<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name','description'];

    public function permissions()
    {
        $this->belongsToMany(Permission::class);
    }
}
