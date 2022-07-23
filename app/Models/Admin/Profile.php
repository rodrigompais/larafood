<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name','description'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function permissionsAvailable()
    {
        $permissions = Permission::whereNotIn('permissions.id', function($query) {
                        $query->select('permission_profile.permission_id');
                        $query->from('permission_profile');
                        $query->whereRaw("permission_profile.profile_id={$this->id}");
        })
        ->paginate();

        return $permissions;
    }    
}
