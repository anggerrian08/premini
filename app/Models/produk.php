<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'kategori_id', 'supplayer_id'];

    // Relasi ke tabel kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // Relasi ke tabel stok
    public function stoks()
    {
        return $this->hasMany(Stok::class);
    }

    // Relasi many-to-many antara Produk dan Order melalui tabel pivot order_items
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
            ->withPivot('quantity'); // Menggunakan pivot untuk menyimpan quantity produk
    }

    // Relasi ke tabel supplier (perbaikan penamaan)
    public function supplayer()
    {
        return $this->belongsTo(Supplayer::class);
    }
}
