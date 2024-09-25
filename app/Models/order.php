<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function karyawans()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }

    // Relasi many-to-many antara Order dan Produk melalui tabel pivot order_items
    public function produks()
    {
       return $this->belongsTo(Produk::class, 'produk_id');
}

}
