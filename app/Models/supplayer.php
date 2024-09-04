<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplayer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'contact_person', 'phone', 'address'];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
