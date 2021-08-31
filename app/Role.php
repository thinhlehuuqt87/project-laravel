<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'slug', 'permissions'];
    protected $casts = ['permission' => 'array'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }

    private function hasPermission(string $permission) : bool
    {
        return $this->permissions[$permission] ?? false;
    }

    public function hasAccess(array $permissions) : bool
    {
        foreach ($permissions as $permission) {
           if ($this->hasPermission($permission)) {
               return true;
           }
        }
        return false;
    }
}
