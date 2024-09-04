<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'kategori_id', 'supplayer_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function stok()
    {
        return $this->hasOne(Stok::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items');
    }

    public function supplayer()
    {
        return $this->belongsTo(Supplayer::class);
    }
}
