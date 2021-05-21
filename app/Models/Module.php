<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $fillable=['name'];



    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

}
