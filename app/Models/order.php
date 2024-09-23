<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'karyawan_id', 'total_price'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    // Relasi many-to-many antara Order dan Produk melalui tabel pivot order_items
    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'order_items')
                    ->withPivot('quantity'); // Menggunakan pivot untuk menyimpan quantity produk
    }
}

