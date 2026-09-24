<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
        'address',
        'status',
    ];

    // satu bisnis bisa punya banyak user (owner, manager, kasir, dll)
    // dan satu user bisa tergabung di banyak bisnis
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // satu bisnis bisa punya banyak outlet
    public function outlets()
    {
        return $this->hasMany(Outlet::class);
    }
}
