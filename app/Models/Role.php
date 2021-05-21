<?php

namespace App\Models;

use App\Models\User;
use App\Models\Module;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable=['name','role'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }
}
