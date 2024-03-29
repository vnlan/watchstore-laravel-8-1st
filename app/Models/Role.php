<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable= ['name', 'display_name', 'description'];

    public function permissions()
    {
     return $this->belongsToMany(Permission::class, 'role_permission', 'role_id', 'permission_id');
    }

    public function users()
    {
    return $this->belongsToMany(User::class);
    }

}
