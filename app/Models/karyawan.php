<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'position'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

