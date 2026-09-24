<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $fillable = [
        'business_id',
        'name',
        'code',
        'address',
        'phone',
        'status',
    ];

    // satu outlet hanyya ada satu bisnis
    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    // satu outlet bisa banayak yser
    // dan satu yser bisa bertugas di bbbnayak outlet
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
